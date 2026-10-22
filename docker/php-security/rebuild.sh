#!/usr/bin/env bash
set -euo pipefail

# Official PHP 7.4 backport, pinned and vendored rather than fetched at build time.
cd /tmp/php-security
echo '5fe57ca6ee96d59b36c6e0ca842843c50884f177bef1e85234cf669b577f5e48  CVE-2026-109618-109619.patch' | sha256sum -c -
test "$(php -r 'echo PHP_VERSION;')" = '7.4.33'
configure_options="$(php-config --configure-options)"
saved_apt_mark="$(apt-mark showmanual)"
build_packages=($PHPIZE_DEPS libargon2-dev libcurl4-openssl-dev libonig-dev
    libreadline-dev libsodium-dev libsqlite3-dev libssl-dev libxml2-dev zlib1g-dev)
if command -v apache2 >/dev/null; then
    build_packages+=(apache2-dev)
fi
# Bullseye's final packages have moved off the live mirrors. Keep signature
# verification enabled; only the archived metadata's expiry check is disabled.
cat > /etc/apt/sources.list <<'EOF'
deb [check-valid-until=no] https://archive.debian.org/debian bullseye main
deb [check-valid-until=no] https://archive.debian.org/debian-security bullseye-security main
EOF
apt-get update
apt-get upgrade -y
apt-get install -y --no-install-recommends "${build_packages[@]}"

docker-php-source extract
cd /usr/src/php
patch --batch --fuzz=0 -p1 < /tmp/php-security/CVE-2026-109618-109619.patch
# Extension builds must also use the patched source and headers.
tar -cJf /usr/src/php.tar.xz --exclude=./.docker-extracted -C /usr/src/php .
export CFLAGS="$PHP_CFLAGS" CPPFLAGS="$PHP_CPPFLAGS" LDFLAGS="$PHP_LDFLAGS"
# php-config emits the original image's whitespace-separated configure arguments.
./configure $configure_options
make -j2
make install

# Verify the patched engine was installed in both CLI and Apache, when present.
nm -D /usr/local/bin/php > /tmp/php-symbols
grep -q ' zend_mm_safe_error_ex$' /tmp/php-symbols
if command -v apache2 >/dev/null; then
    nm -D /usr/lib/apache2/modules/libphp7.so > /tmp/php-symbols
    grep -q ' zend_mm_safe_error_ex$' /tmp/php-symbols
fi
cd /
docker-php-source delete
apt-mark auto '.*' >/dev/null
apt-mark manual $saved_apt_mark >/dev/null
apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false
rm -rf /var/lib/apt/lists/* /tmp/php-symbols /tmp/php-security
php --version
