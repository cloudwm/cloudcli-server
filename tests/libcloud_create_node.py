import os
from libcloud.compute.types import Provider
from libcloud.compute.providers import get_driver


# instantiate the driver

cls = get_driver(Provider.KAMATERA)

if os.environ.get('API_SERVER') == 'localhost':
    kwargs = {'secure':False, 'host':'localhost', 'port':8000}
driver = cls(os.environ['API_CLIENT_ID'], os.environ['API_SECRET'], **kwargs)

# set create node params from capabilities, locations and size lists

locations = {location.id: location for location in driver.list_locations()}
assert locations['IL'].country == 'Israel'
assert locations['IL-JR'].name == 'Jerusalem'
assert locations['EU'].id == 'EU'
location = locations['EU']
capabilities = driver.ex_list_capabilities(location)
cpuTypes = {cpuType['id']: cpuType for cpuType in capabilities['cpuTypes']}
assert cpuTypes['B']['name'] == 'Type B - General Purpose'
cpuType = cpuTypes['B']
assert len(cpuType['cpuCores']) > 2
cpuCores = cpuType['cpuCores'][1]
assert len(cpuType['ramMB']) > 3
ramMB = cpuType['ramMB'][2]
assert(len(capabilities['diskSizeGB']) > 3)
diskSizeGB = capabilities['diskSizeGB'][2]
billingCycle = driver.EX_BILLINGCYCLE_HOURLY
assert(len(capabilities['monthlyTrafficPackage']) > 1)
size = driver.ex_get_size(ramMB, diskSizeGB, cpuType['id'], cpuCores)
selected_image = None
for image in driver.list_images(location):
    if image.name == 'Ubuntu Server version 18.04 LTS (bionic) 64-bit':
        selected_image = image
        break
assert selected_image

# create node

kwargs = {
    "name": "test_libcloud_server",
    "size": size,
    "image": image,
    "location": location,
    "ex_billingcycle": billingCycle
}

print('creating node...')
print(kwargs)

node = driver.create_node(**kwargs)

assert node.name.startswith('test_libcloud_server')
assert len(node.id) > 5
assert node.state == 'running'
assert len(node.public_ips) > 0
assert len(node.extra) > 3
assert len(node.extra['generated_password']) > 5

print('libcloud create node: Great Success!')
