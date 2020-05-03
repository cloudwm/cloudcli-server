import json
import os
import subprocess

testsdir = os.path.dirname(__file__)
outputdir = os.path.abspath(os.path.join(testsdir, "output"))
os.makedirs(outputdir, exist_ok=True)

os.makedirs("/etc/salt/cloud.providers.d", exist_ok=True)
if os.path.exists("/etc/salt/cloud.providers.d/cloudcli-server-test-kamatera.conf"):
    os.unlink("/etc/salt/cloud.providers.d/cloudcli-server-test-kamatera.conf")
with open("/etc/salt/cloud.providers.d/cloudcli-server-test-kamatera.conf", "w") as f:
    f.write("""
cloudcli-server-test-kamatera:
    driver: kamatera
    api_client_id: {KAMATERA_API_CLIENT_ID}
    api_secret: {KAMATERA_API_SECRET}
    api_url: {KAMATERA_API_URL}
""".format(**os.environ))

print("listing locations...")
with open(os.path.join(outputdir, "salt-locations.json"), "wb") as f:
    f.write(subprocess.check_output(["%s/salt-cloud" % os.environ["SALT_BIN_DIR"], "--out=json", "--list-locations", "cloudcli-server-test-kamatera"]))

with open(os.path.join(outputdir, "salt-locations.json")) as f:
    locations = json.load(f)["cloudcli-server-test-kamatera"]["kamatera"]
assert locations["IL"] == "Rosh Haayin, Israel (Middle East)"
assert len(locations) > 10
print("OK")

print("listing sizes...")
with open(os.path.join(outputdir, "salt-sizes.json"), "wb") as f:
    f.write(subprocess.check_output(["%s/salt-cloud" % os.environ["SALT_BIN_DIR"], "--out=json", "--location=IL", "--list-sizes", "cloudcli-server-test-kamatera"]))

with open(os.path.join(outputdir, "salt-sizes.json")) as f:
    sizes = json.load(f)["cloudcli-server-test-kamatera"]["kamatera"]
assert len(sizes) > 3
assert sizes["B"]["name"] == "Type B - General Purpose"
print("OK")

print("listing available server options...")
with open(os.path.join(outputdir, "salt-server-options.json"), "wb") as f:
    f.write(subprocess.check_output(["%s/salt-cloud" % os.environ["SALT_BIN_DIR"], "--out=json", "--location=IL", "-f", "avail_server_options", "cloudcli-server-test-kamatera"]))

with open(os.path.join(outputdir, "salt-server-options.json")) as f:
    server_options = json.load(f)["cloudcli-server-test-kamatera"]["kamatera"]
assert len(server_options) > 1
assert server_options["monthlyTrafficPackage"]["t5000"] == "5000GB/month on 10Gbit/sec port"
print("OK")

print("listing images...")
with open(os.path.join(outputdir, "salt-images.json"), "wb") as f:
    f.write(subprocess.check_output(["%s/salt-cloud" % os.environ["SALT_BIN_DIR"], "--out=json", "--location=IL", "--list-images", "cloudcli-server-test-kamatera"]))

with open(os.path.join(outputdir, "salt-images.json")) as f:
    images = json.load(f)["cloudcli-server-test-kamatera"]["kamatera"]
assert len(images) > 10
assert images["IL:6000C29a5a7220dcf84716e7bba74215"] == "Ubuntu Server version 18.04 LTS (bionic) 64-bit"
print("OK")

os.makedirs("/etc/salt/cloud.profiles.d", exist_ok=True)
if os.path.exists("/etc/salt/cloud.profiles.d/cloudcli-server-test.conf"):
    os.unlink("/etc/salt/cloud.profiles.d/cloudcli-server-test.conf")
with open("/etc/salt/cloud.profiles.d/cloudcli-server-test.conf", "w") as f:
    f.write("""
cloudcli-server-test:
    provider: cloudcli-server-test-kamatera
    location: IL
    cpu_type: B
    cpu_cores: 2
    ram_mb: 2048
    disk_size_gb: 20
    extra_disk_sizes_gb:
    - 15
    billing_cycle: hourly
    monthly_traffic_package: t5000
    image: IL:6000C29a5a7220dcf84716e7bba74215
    networks:
    - name: wan
      ip: auto
    daily_backup: false
    managed: false
""")

print("creating server...")
with open(os.path.join(outputdir, "salt-create-server.json"), "wb") as f:
    f.write(subprocess.check_output(["%s/salt-cloud" % os.environ["SALT_BIN_DIR"], "--out=json", "-p", "cloudcli-server-test", "salttest"]))

with open(os.path.join(outputdir, "salt-create-server.json")) as f:
    jsonlines = None
    for line in f.readlines():
        if line.strip() == "{":
            jsonlines = ["{"]
        elif jsonlines is not None:
            jsonlines.append(line.strip())
    created_server = json.loads("\n".join(jsonlines))["salttest"]
assert created_server["deployed"] == True
created_server_name = created_server["name"]
print("created_server_name = " + created_server_name)
print("OK")

print("listing servers..")
with open(os.path.join(outputdir, "salt-query.json"), "wb") as f:
    f.write(subprocess.check_output(["%s/salt-cloud" % os.environ["SALT_BIN_DIR"], "--out=json", "-Q"]))

with open(os.path.join(outputdir, "salt-query.json")) as f:
    servers = json.load(f)["cloudcli-server-test-kamatera"]["kamatera"]
assert len(servers) > 0
assert servers[created_server_name]["state"] == "running"
print("OK")

print("deleting server...")
with open(os.path.join(outputdir, "salt-delete.json"), "wb") as f:
    f.write(subprocess.check_output(["%s/salt-cloud" % os.environ["SALT_BIN_DIR"], "--out=json", "-y", "-d", created_server_name]))

with open(os.path.join(outputdir, "salt-delete.json")) as f:
    servers = json.load(f)["cloudcli-server-test-kamatera"]["kamatera"]
assert len(servers) > 0
assert servers[created_server_name]["state"] == "destroyed"
assert servers[created_server_name]["success"] == True
print("OK")
