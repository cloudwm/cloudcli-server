import subprocess
import tempfile
import json
import os


testsdir = os.path.dirname(__file__)
outputdir = os.path.abspath(os.path.join(testsdir, "output"))
os.makedirs(outputdir, exist_ok=True)

subprocess.check_call(["ansible-playbook", "tests/ansible_playbooks/compute_datacenters_playbook.yml", "-e", "output_dir=%s" % outputdir])

with open(os.path.join(outputdir, 'kamatera_datacenters.json')) as f:
  datacenters = json.load(f)
assert set(datacenters[0].keys()) == set(['category', 'subCategory', 'name', 'id']), set(datacenters[0].keys())
for k,v in datacenters[0].items():
  assert len(v) > 1, '%s=%s' % (k, v)

subprocess.check_call(["ansible-playbook", "tests/ansible_playbooks/compute_options_playbook.yml", "-e", "output_dir=%s" % outputdir, "-e", "datacenter=EU-LO"])

with open(os.path.join(outputdir, 'kamatera_datacenter_capabilities.json')) as f:
  capabilities = json.load(f)
assert set(capabilities.keys()) == set(['cpuTypes', 'defaultMonthlyTrafficPackage', 'diskSizeGB', 'monthlyTrafficPackage']), set(capabilities.keys())
for k,v in capabilities.items():
  assert len(v) > 0, '%s=%s' % (k,v)

with open(os.path.join(outputdir, 'kamatera_datacenter_images.json')) as f:
  images = json.load(f)
assert set(images[0].keys()) == set(['datacenter', 'code', 'name', 'osDiskSizeGB', 'ramMBMin', 'os', 'id']), set(images[0].keys())
for k,v in images[0].items():
  if k == 'osDiskSizeGB':
    assert v > 0, '%s=%s' % (k,v)
  else:
    assert len(v) > 0, '%s=%s' % (k,v)
for image in images:
  if image['os'] == 'Ubuntu' and image['code'] == '18.04 64bit':
    image_id = image['id']

create_args = [
    "-e", "datacenter=EU-LO",
    "-e", "image=%s" % image_id,
    "-e", "cpu_type=%s" % capabilities['cpuTypes'][0]['id'],
    "-e", "cpu_cores=%s" % capabilities['cpuTypes'][0]['cpuCores'][2],
    "-e", "ram_mb=%s" % capabilities['cpuTypes'][0]['ramMB'][4],
    "-e", "disk_size_gb=%s" % capabilities['diskSizeGB'][4],
    "-e", "disk_size_2_gb=%s" % capabilities['diskSizeGB'][2]
]

subprocess.check_call(["ansible-playbook", "tests/ansible_playbooks/compute_playbook.yml", "-e", "output_dir=%s" % outputdir, "-e", "server_name=ansibletest", *create_args])

print("Great Success!")
