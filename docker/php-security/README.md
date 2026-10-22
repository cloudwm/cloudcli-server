# PHP 7.4 emergency backport

`CVE-2026-109618-109619.patch` is the unmodified patch from:

https://github.com/php/php-src/commit/712e60f9edfd03f0960fc4fc3c2c375f42b90aa2.patch

SHA-256: `5fe57ca6ee96d59b36c6e0ca842843c50884f177bef1e85234cf669b577f5e48`

The PHP project links this branch from its October 21, 2026 security advisory:
https://www.php.net/archive/2026.php#2026-10-21-5

`rebuild.sh` preserves the official image's configure options, applies the
patch to the bundled 7.4.33 source, and replaces the installed runtime and
source archive before any extensions are compiled. It verifies the new
`zend_mm_safe_error_ex` symbol in the CLI and, for production, `libphp7.so`.
The symbol check is an installation guard, not an exploit regression test.

Remove this directory and the rebuild steps when migrating to a supported,
patched PHP image. Do not remove the backport while retaining stock PHP 7.4.
