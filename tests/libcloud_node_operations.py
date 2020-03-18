import os
from libcloud.compute.types import Provider
from libcloud.compute.providers import get_driver


# instantiate the driver

cls = get_driver(Provider.KAMATERA)

if os.environ.get('API_SERVER') == 'localhost':
    kwargs = {'secure':False, 'host':'localhost', 'port': int(os.environ.get('CLOUDCLI_SERVER_PORT', '8000'))}
else:
    kwargs = {}
driver = cls(os.environ['API_CLIENT_ID'], os.environ['API_SECRET'], **kwargs)

nodes = driver.list_nodes('test_libcloud_server.*')
assert len(nodes) > 0
node = nodes[0]
assert node.name.startswith('test_libcloud_server')
assert len(node.id) > 5
assert node.state == 'running'
assert len(node.public_ips) > 0
assert len(node.extra) > 3

print('running node operations...')

print('stop')
assert node.stop_node()
print('start')
assert node.start()
print('reboot')
assert node.reboot()
print('destroy')
assert node.destroy()

print('libcloud node operations: Great Success!')
