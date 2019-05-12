<?php

namespace App\Cloudcli;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TestServer extends BaseServer {

    function listServers($request, $command) {
        return [
            [
                "id" =>'TEST-SERVER-1-ID',
                "name" => "test-server-1-name",
                "datacenter" => "IL",
                "power" => "on",
            ],
            [
                "id" =>'TEST-SERVER-2-ID',
                "name" => "test-server-2-name",
                "datacenter" => "IL",
                "power" => "on",
            ]
        ];
    }

    function getServerOptions($request, $command) {
        return json_decode(TEST_SERVER_OPTIONS_JSON, true);
    }

    function createServer($request, $command) {
        return $this->_serverPost($request, $command);
    }

    protected function _serverPost(Request $request, $command, $httpMethod=null) {
        return ["1234567"];
    }

}


const TEST_SERVER_OPTIONS_JSON = '{
    "datacenters": {
        "AS": "AS: China",
        "CA-TR": "CA-TR: Canada",
        "DEV": "DEV: DEV",
        "EU": "EU: The Netherlands",
        "EU-FR": "EU-FR: Germany",
        "EU-LO": "EU-LO: United Kingdom",
        "IL": "IL: Israel",
        "IL-JR": "IL-JR: Israel",
        "IL-PT": "IL-PT: Israel",
        "IL-RH": "IL-RH: Israel",
        "IL-TA": "IL-TA: Israel",
        "US-NY2": "US-NY2: United States",
        "US-SC": "US-SC: United States",
        "US-TX": "US-TX: United States"
    },
    "cpu": [
        "1B",
        "2B",
        "4B",
        "6B",
        "8B",
        "12B",
        "16B",
        "20B",
        "24B",
        "28B",
        "32B",
        "36B",
        "40B",
        "48B",
        "56B",
        "64B",
        "1D",
        "2D",
        "4D",
        "6D",
        "8D",
        "12D",
        "16D",
        "20D"
    ],
    "ram": [
        256,
        512,
        1024,
        2048,
        3072,
        4096,
        6144,
        8192,
        10240,
        12288,
        16384,
        24576,
        32768,
        49152,
        65536,
        98304,
        131072,
        200704,
        262144
    ],
    "disk": [
        5,
        10,
        15,
        20,
        30,
        40,
        50,
        60,
        80,
        100,
        150,
        200,
        250,
        300,
        350,
        400,
        450,
        500,
        600,
        700,
        800,
        900,
        1000
    ],
    "diskImages": {
        "AS": [
            {
                "description": "ubuntu_server_16.04_32-bit",
                "id": "AS:6000C2901a61dff371f4d1d34bd9548b",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit_optimized_updated",
                "id": "AS:6000C2904fc6d8295d2b6d9687ed955e",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_zevenet_zevenet-latest-ubuntuserver-18.04",
                "id": "AS:6000C2909e0736f7b76b1dc70d11567e",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_memcached_memcached-latest-ubuntuserver-18.04",
                "id": "AS:6000C290a79ae490560b068973cb35f9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_minimal",
                "id": "AS:6000C291195abef23f2815c6f7cc301a",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome",
                "id": "AS:6000C2914d34f8fb8b449a686c6df4a5",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_freenas_11.1_64bit",
                "id": "AS:6000C2916500bde8a8dba053a727a2fd",
                "sizeGB": 2,
                "usageInfo": "FreeNAS is a free and open-source network-attached storage (NAS) software based on FreeBSD and the OpenZFS file system. Provides Storage Appliance supported SMB, AFP, NFS, iSCSI, SSH, rsync and FTP\/TFTP protocols. Advanced FreeNAS features include full-disk encryption and a plug-in architecture for third-party software.\n\nConnect to FreeNAS with HTTPS Protocol:\n\nhttps:\/\/{server-ip-address]\/\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_15.04_64-bit",
                "id": "AS:6000C29188a2a1c97070d1d6fb71ee89",
                "sizeGB": 5,
                "usageInfo": "In order to connect to the server with SSH, use Putty SSH Client or any other SSH Client with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nYou can find the server\'s details below.",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_basic_server",
                "id": "AS:6000C291a7dbc4a539dc4500ed1975c5",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-liveinstall-centos-7.4-64-bit-minimal",
                "id": "AS:6000C291ac5094ec6fe3dabe0baca794",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_basic_server",
                "id": "AS:6000C2924b678625c2b07d04b4978e18",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_nginx-mysql-php7",
                "id": "AS:6000C2929e92b7444e77af9b149bc9f4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-7.4-64-bit",
                "id": "AS:6000C2935944aaac4c21701d3cde9610",
                "sizeGB": 15,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.2-ubuntuserver-18.04",
                "id": "AS:6000C29373bf2a83a8c8610ab80234e7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_32-bit",
                "id": "AS:6000C29386a7def39b3fc7e4d88eba8c",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpbb_phpbb-3.2.5-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "AS:6000C293bacc4ad2e026f66939baff71",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_standard_64-bit",
                "id": "AS:6000C2947a5d7c8fead78a1ec1224fdf",
                "sizeGB": 23,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_datacenter_64-bit",
                "id": "AS:6000C294fa713a5218e4d2fe9e6026c8",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_jenkins_jenkins-latest-ubuntuserver-18.04",
                "id": "AS:6000C295159bc110a5482400667a7cd8",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_64-bit",
                "id": "AS:6000C29541e39a9892043d7237503d06",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_desktop_8.6_64-bit_xfce4",
                "id": "AS:6000C2956fdfc1fa3ffe061ba7bd46ce",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_64-bit",
                "id": "AS:6000C29574cbda93387eac758727a6c9",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_32-bit",
                "id": "AS:6000C295834b332b89f79521cdabca9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_datacenter_64-bit",
                "id": "AS:6000C2960d7769492105a558d145c7d3",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)Username: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-10-ubuntuserver-18.04",
                "id": "AS:6000C2967a1c0e996b1fadc4b42aa10f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_minimal",
                "id": "AS:6000C296c816785af0416189ce873152",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_32-bit",
                "id": "AS:6000C296d934a62e14bd45586beeec3f",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_minimal",
                "id": "AS:6000C29786f615663312af9d49bba1ef",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_minimal",
                "id": "AS:6000C2979e186bf7a61242f3bc49c945",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome_xrdp",
                "id": "AS:6000C297b448da1e088f8bc4eb0be63c",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_10_desktop_64-bit",
                "id": "AS:6000C2982b0030c2dbf98bcb092f92b4",
                "sizeGB": 25,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_basic_server",
                "id": "AS:6000C2982cc1f899e74c4f39a9e81998",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_32bit",
                "id": "AS:6000C2983bdd8b531ecfc6d892a35aa4",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_lemp-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "AS:6000C2983ff90afd6b38b5f897e32d06",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_nextcloud_nextcloud-15-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "AS:6000C2985991f64467b47d662bcb90bf",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_drupal_drupal-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "AS:6000C29863642e2615dcf655f5c2079f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.4_64-bit",
                "id": "AS:6000C2988f5660c446590588b456ba80",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_datacenter_64-bit",
                "id": "AS:6000C298abe9aa378af7832e3d7de7b6",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_64bit",
                "id": "AS:6000C298bb2e4ea0f1891cd81735d24e",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_16.04_64-bit",
                "id": "AS:6000C298bbb2d3b6e9721f4f4f3c5bf0",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_enterprise_64-bit",
                "id": "AS:6000C298c677d7da830e4f3ae1765c7e",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_ubuntu64",
                "id": "AS:6000C29919a41ecc0c790bf1437db1b0",
                "sizeGB": 15,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nOnce you have logged in, a simple console interface will appear and allow you to configure your site, ftp accounts, SSLs and more server configurations.\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_8.1_desktop_64-bit",
                "id": "AS:6000C2999afdfe69dc442ed1dcb26fa1",
                "sizeGB": 23,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_pfsense_2.4_64bit",
                "id": "AS:6000C299bd669da13cf92d780e19674d",
                "sizeGB": 2,
                "usageInfo": "Connect to the firewall using HTTPS protocol, \n\nhttps:\/\/{server-ip-address]\/\nUsername: admin\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_redis_redisserver-latest-ubuntuserver-18.04",
                "id": "AS:6000C299c73cf650577c6e9781938225",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_64-bit",
                "id": "AS:6000C299f04969dee8d55d2d3f0dbb96",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit",
                "id": "AS:6000C29a5a7220dcf84716e7bba74215",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_dockermachinecli-0.16-ubuntuserver-18.04",
                "id": "AS:6000C29a64893c54afb3950e87ba5724",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nfs_nfsserver-ubuntuserver-18.04",
                "id": "AS:6000C29a770013a930d717463fcad6a1",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_standard_64-bit",
                "id": "AS:6000C29a99c7cc5d67b773c85d017307",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_32-bit",
                "id": "AS:6000C29a9eb2046f9d486e0297051ec8",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_tomcat_tomcat-8-ubuntuserver-18.04",
                "id": "AS:6000C29ab1e22c5da5c8834442d97da7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_magento_magento-2.3-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "AS:6000C29ac6ac759b2ac9a121015cbe35",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-64-bit",
                "id": "AS:6000C29ad2662cd36cbf937fd7b46fd4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_redmine_redmine-4.0-ubuntuserver-18.04-mysqlserver-5.7",
                "id": "AS:6000C29b1af5c41bcfb0bfc9a8a09ff3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.6-ubuntuserver-18.04",
                "id": "AS:6000C29b30e4d970258a3e02b26f884a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_joomla_joomla-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "AS:6000C29b3a176f8fbeeaef8cabc285f7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_basic_server",
                "id": "AS:6000C29b6395b4cc22896d745fa1a5c4",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-csf-cmc-liveinstall-centos-7.4-64-bit-minimal",
                "id": "AS:6000C29b961d6c43182a64407d951542",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_64-bit",
                "id": "AS:6000C29bb8fde673f515caf9bed695a1",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_minimal",
                "id": "AS:6000C29c258bce8d868fa38afb946073",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_minio_minio-latest-ubuntuserver-18.04",
                "id": "AS:6000C29c540ff1dbace7682100bb3282",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_dokuwiki_dokuwiki-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "AS:6000C29c54ed40e5880c90ef8a6115bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_openvpn_openvpn-2.6.1-ubuntuserver-18.04",
                "id": "AS:6000C29c894a1cd4f38f1db3d72cc5ea",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_basic_server",
                "id": "AS:6000C29c9bfc5ab3a09ff3a80dfe46ce",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_desktop_7.4_64-bit_gnome",
                "id": "AS:6000C29ce092378f6d9f2985c7ebdb49",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_32-bit",
                "id": "AS:6000C29cebd37daa2ee4d7f6de19e931",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-8.0-ubuntuserver-18.04",
                "id": "AS:6000C29d16b1507a7a92873aa813eb0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_wordpress-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "AS:6000C29d365974def3ea2ae16eaa5f0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_64-bit",
                "id": "AS:6000C29d4049980bd16c74aa8ba91c9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpmyadmin_phpmyadmin-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "AS:6000C29d6adcf6f7bbc0b10a42860eda",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-5.7-ubuntuserver-18.04",
                "id": "AS:6000C29d9e2994c7ea6e03d8f470bda3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_standard_64-bit",
                "id": "AS:6000C29e684efebf574b286df3b4ff4f",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-11-ubuntuserver-18.04",
                "id": "AS:6000C29ea9dccc977a7cec3c16162d96",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_docker-ready-ubuntuserver-18.04",
                "id": "AS:6000C29f1950d63de8fed8095fdf6e64",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-32-bit",
                "id": "AS:6000C29f24bc8ec8a605b6d7bfe58835",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-dnsonly-liveinstall-centos-7.4_64-bit-minimal",
                "id": "AS:6000C29f5b14b91631c7678a2dc4b8cf",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-4.0-ubuntuserver-18.04",
                "id": "AS:6000C29f62a7292b19903fb7bdc4d7da",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.4-ubuntuserver-18.04",
                "id": "AS:6000C29fd761c6f26056d138e165b2bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            }
        ],
        "CA-TR": [
            {
                "description": "ubuntu_server_16.04_32-bit",
                "id": "CA-TR:6000C2901a61dff371f4d1d34bd9548b",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit_optimized_updated",
                "id": "CA-TR:6000C2904fc6d8295d2b6d9687ed955e",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_zevenet_zevenet-latest-ubuntuserver-18.04",
                "id": "CA-TR:6000C2909e0736f7b76b1dc70d11567e",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_memcached_memcached-latest-ubuntuserver-18.04",
                "id": "CA-TR:6000C290a79ae490560b068973cb35f9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_minimal",
                "id": "CA-TR:6000C291195abef23f2815c6f7cc301a",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome",
                "id": "CA-TR:6000C2914d34f8fb8b449a686c6df4a5",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_freenas_11.1_64bit",
                "id": "CA-TR:6000C2916500bde8a8dba053a727a2fd",
                "sizeGB": 2,
                "usageInfo": "FreeNAS is a free and open-source network-attached storage (NAS) software based on FreeBSD and the OpenZFS file system. Provides Storage Appliance supported SMB, AFP, NFS, iSCSI, SSH, rsync and FTP\/TFTP protocols. Advanced FreeNAS features include full-disk encryption and a plug-in architecture for third-party software.\n\nConnect to FreeNAS with HTTPS Protocol:\n\nhttps:\/\/{server-ip-address]\/\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_15.04_64-bit",
                "id": "CA-TR:6000C29188a2a1c97070d1d6fb71ee89",
                "sizeGB": 5,
                "usageInfo": "In order to connect to the server with SSH, use Putty SSH Client or any other SSH Client with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nYou can find the server\'s details below.",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_basic_server",
                "id": "CA-TR:6000C291a7dbc4a539dc4500ed1975c5",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-liveinstall-centos-7.4-64-bit-minimal",
                "id": "CA-TR:6000C291ac5094ec6fe3dabe0baca794",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_basic_server",
                "id": "CA-TR:6000C2924b678625c2b07d04b4978e18",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_nginx-mysql-php7",
                "id": "CA-TR:6000C2929e92b7444e77af9b149bc9f4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-7.4-64-bit",
                "id": "CA-TR:6000C2935944aaac4c21701d3cde9610",
                "sizeGB": 15,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.2-ubuntuserver-18.04",
                "id": "CA-TR:6000C29373bf2a83a8c8610ab80234e7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_32-bit",
                "id": "CA-TR:6000C29386a7def39b3fc7e4d88eba8c",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpbb_phpbb-3.2.5-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "CA-TR:6000C293bacc4ad2e026f66939baff71",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_standard_64-bit",
                "id": "CA-TR:6000C2947a5d7c8fead78a1ec1224fdf",
                "sizeGB": 23,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_datacenter_64-bit",
                "id": "CA-TR:6000C294fa713a5218e4d2fe9e6026c8",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_jenkins_jenkins-latest-ubuntuserver-18.04",
                "id": "CA-TR:6000C295159bc110a5482400667a7cd8",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_64-bit",
                "id": "CA-TR:6000C29541e39a9892043d7237503d06",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_desktop_8.6_64-bit_xfce4",
                "id": "CA-TR:6000C2956fdfc1fa3ffe061ba7bd46ce",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_64-bit",
                "id": "CA-TR:6000C29574cbda93387eac758727a6c9",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_32-bit",
                "id": "CA-TR:6000C295834b332b89f79521cdabca9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_datacenter_64-bit",
                "id": "CA-TR:6000C2960d7769492105a558d145c7d3",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)Username: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-10-ubuntuserver-18.04",
                "id": "CA-TR:6000C2967a1c0e996b1fadc4b42aa10f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_minimal",
                "id": "CA-TR:6000C296c816785af0416189ce873152",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_32-bit",
                "id": "CA-TR:6000C296d934a62e14bd45586beeec3f",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_minimal",
                "id": "CA-TR:6000C29786f615663312af9d49bba1ef",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_minimal",
                "id": "CA-TR:6000C2979e186bf7a61242f3bc49c945",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome_xrdp",
                "id": "CA-TR:6000C297b448da1e088f8bc4eb0be63c",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_10_desktop_64-bit",
                "id": "CA-TR:6000C2982b0030c2dbf98bcb092f92b4",
                "sizeGB": 25,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_basic_server",
                "id": "CA-TR:6000C2982cc1f899e74c4f39a9e81998",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_32bit",
                "id": "CA-TR:6000C2983bdd8b531ecfc6d892a35aa4",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_lemp-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "CA-TR:6000C2983ff90afd6b38b5f897e32d06",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_nextcloud_nextcloud-15-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "CA-TR:6000C2985991f64467b47d662bcb90bf",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_drupal_drupal-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "CA-TR:6000C29863642e2615dcf655f5c2079f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.4_64-bit",
                "id": "CA-TR:6000C2988f5660c446590588b456ba80",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_datacenter_64-bit",
                "id": "CA-TR:6000C298abe9aa378af7832e3d7de7b6",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_64bit",
                "id": "CA-TR:6000C298bb2e4ea0f1891cd81735d24e",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_16.04_64-bit",
                "id": "CA-TR:6000C298bbb2d3b6e9721f4f4f3c5bf0",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_enterprise_64-bit",
                "id": "CA-TR:6000C298c677d7da830e4f3ae1765c7e",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_ubuntu64",
                "id": "CA-TR:6000C29919a41ecc0c790bf1437db1b0",
                "sizeGB": 15,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nOnce you have logged in, a simple console interface will appear and allow you to configure your site, ftp accounts, SSLs and more server configurations.\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_8.1_desktop_64-bit",
                "id": "CA-TR:6000C2999afdfe69dc442ed1dcb26fa1",
                "sizeGB": 23,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_pfsense_2.4_64bit",
                "id": "CA-TR:6000C299bd669da13cf92d780e19674d",
                "sizeGB": 2,
                "usageInfo": "Connect to the firewall using HTTPS protocol, \n\nhttps:\/\/{server-ip-address]\/\nUsername: admin\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_redis_redisserver-latest-ubuntuserver-18.04",
                "id": "CA-TR:6000C299c73cf650577c6e9781938225",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_64-bit",
                "id": "CA-TR:6000C299f04969dee8d55d2d3f0dbb96",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit",
                "id": "CA-TR:6000C29a5a7220dcf84716e7bba74215",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_dockermachinecli-0.16-ubuntuserver-18.04",
                "id": "CA-TR:6000C29a64893c54afb3950e87ba5724",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nfs_nfsserver-ubuntuserver-18.04",
                "id": "CA-TR:6000C29a770013a930d717463fcad6a1",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_standard_64-bit",
                "id": "CA-TR:6000C29a99c7cc5d67b773c85d017307",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_32-bit",
                "id": "CA-TR:6000C29a9eb2046f9d486e0297051ec8",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_tomcat_tomcat-8-ubuntuserver-18.04",
                "id": "CA-TR:6000C29ab1e22c5da5c8834442d97da7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_magento_magento-2.3-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "CA-TR:6000C29ac6ac759b2ac9a121015cbe35",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-64-bit",
                "id": "CA-TR:6000C29ad2662cd36cbf937fd7b46fd4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_redmine_redmine-4.0-ubuntuserver-18.04-mysqlserver-5.7",
                "id": "CA-TR:6000C29b1af5c41bcfb0bfc9a8a09ff3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.6-ubuntuserver-18.04",
                "id": "CA-TR:6000C29b30e4d970258a3e02b26f884a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_joomla_joomla-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "CA-TR:6000C29b3a176f8fbeeaef8cabc285f7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_basic_server",
                "id": "CA-TR:6000C29b6395b4cc22896d745fa1a5c4",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-csf-cmc-liveinstall-centos-7.4-64-bit-minimal",
                "id": "CA-TR:6000C29b961d6c43182a64407d951542",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_64-bit",
                "id": "CA-TR:6000C29bb8fde673f515caf9bed695a1",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_minimal",
                "id": "CA-TR:6000C29c258bce8d868fa38afb946073",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_minio_minio-latest-ubuntuserver-18.04",
                "id": "CA-TR:6000C29c540ff1dbace7682100bb3282",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_dokuwiki_dokuwiki-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "CA-TR:6000C29c54ed40e5880c90ef8a6115bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_openvpn_openvpn-2.6.1-ubuntuserver-18.04",
                "id": "CA-TR:6000C29c894a1cd4f38f1db3d72cc5ea",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_basic_server",
                "id": "CA-TR:6000C29c9bfc5ab3a09ff3a80dfe46ce",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_desktop_7.4_64-bit_gnome",
                "id": "CA-TR:6000C29ce092378f6d9f2985c7ebdb49",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_32-bit",
                "id": "CA-TR:6000C29cebd37daa2ee4d7f6de19e931",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-8.0-ubuntuserver-18.04",
                "id": "CA-TR:6000C29d16b1507a7a92873aa813eb0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_wordpress-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "CA-TR:6000C29d365974def3ea2ae16eaa5f0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_64-bit",
                "id": "CA-TR:6000C29d4049980bd16c74aa8ba91c9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpmyadmin_phpmyadmin-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "CA-TR:6000C29d6adcf6f7bbc0b10a42860eda",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-5.7-ubuntuserver-18.04",
                "id": "CA-TR:6000C29d9e2994c7ea6e03d8f470bda3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_standard_64-bit",
                "id": "CA-TR:6000C29e684efebf574b286df3b4ff4f",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-11-ubuntuserver-18.04",
                "id": "CA-TR:6000C29ea9dccc977a7cec3c16162d96",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_docker-ready-ubuntuserver-18.04",
                "id": "CA-TR:6000C29f1950d63de8fed8095fdf6e64",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-32-bit",
                "id": "CA-TR:6000C29f24bc8ec8a605b6d7bfe58835",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-dnsonly-liveinstall-centos-7.4_64-bit-minimal",
                "id": "CA-TR:6000C29f5b14b91631c7678a2dc4b8cf",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-4.0-ubuntuserver-18.04",
                "id": "CA-TR:6000C29f62a7292b19903fb7bdc4d7da",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.4-ubuntuserver-18.04",
                "id": "CA-TR:6000C29fd761c6f26056d138e165b2bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            }
        ],
        "DEV": [],
        "EU": [
            {
                "description": "ubuntu_server_16.04_32-bit",
                "id": "EU:6000C2901a61dff371f4d1d34bd9548b",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit_optimized_updated",
                "id": "EU:6000C2904fc6d8295d2b6d9687ed955e",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_zevenet_zevenet-latest-ubuntuserver-18.04",
                "id": "EU:6000C2909e0736f7b76b1dc70d11567e",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_memcached_memcached-latest-ubuntuserver-18.04",
                "id": "EU:6000C290a79ae490560b068973cb35f9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_minimal",
                "id": "EU:6000C291195abef23f2815c6f7cc301a",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome",
                "id": "EU:6000C2914d34f8fb8b449a686c6df4a5",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_freenas_11.1_64bit",
                "id": "EU:6000C2916500bde8a8dba053a727a2fd",
                "sizeGB": 2,
                "usageInfo": "FreeNAS is a free and open-source network-attached storage (NAS) software based on FreeBSD and the OpenZFS file system. Provides Storage Appliance supported SMB, AFP, NFS, iSCSI, SSH, rsync and FTP\/TFTP protocols. Advanced FreeNAS features include full-disk encryption and a plug-in architecture for third-party software.\n\nConnect to FreeNAS with HTTPS Protocol:\n\nhttps:\/\/{server-ip-address]\/\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_15.04_64-bit",
                "id": "EU:6000C29188a2a1c97070d1d6fb71ee89",
                "sizeGB": 5,
                "usageInfo": "In order to connect to the server with SSH, use Putty SSH Client or any other SSH Client with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nYou can find the server\'s details below.",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_basic_server",
                "id": "EU:6000C291a7dbc4a539dc4500ed1975c5",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-liveinstall-centos-7.4-64-bit-minimal",
                "id": "EU:6000C291ac5094ec6fe3dabe0baca794",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_basic_server",
                "id": "EU:6000C2924b678625c2b07d04b4978e18",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_nginx-mysql-php7",
                "id": "EU:6000C2929e92b7444e77af9b149bc9f4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-7.4-64-bit",
                "id": "EU:6000C2935944aaac4c21701d3cde9610",
                "sizeGB": 15,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.2-ubuntuserver-18.04",
                "id": "EU:6000C29373bf2a83a8c8610ab80234e7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_32-bit",
                "id": "EU:6000C29386a7def39b3fc7e4d88eba8c",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpbb_phpbb-3.2.5-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU:6000C293bacc4ad2e026f66939baff71",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_standard_64-bit",
                "id": "EU:6000C2947a5d7c8fead78a1ec1224fdf",
                "sizeGB": 23,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_datacenter_64-bit",
                "id": "EU:6000C294fa713a5218e4d2fe9e6026c8",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_jenkins_jenkins-latest-ubuntuserver-18.04",
                "id": "EU:6000C295159bc110a5482400667a7cd8",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_64-bit",
                "id": "EU:6000C29541e39a9892043d7237503d06",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_desktop_8.6_64-bit_xfce4",
                "id": "EU:6000C2956fdfc1fa3ffe061ba7bd46ce",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_64-bit",
                "id": "EU:6000C29574cbda93387eac758727a6c9",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_32-bit",
                "id": "EU:6000C295834b332b89f79521cdabca9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_datacenter_64-bit",
                "id": "EU:6000C2960d7769492105a558d145c7d3",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)Username: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-10-ubuntuserver-18.04",
                "id": "EU:6000C2967a1c0e996b1fadc4b42aa10f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_minimal",
                "id": "EU:6000C296c816785af0416189ce873152",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_32-bit",
                "id": "EU:6000C296d934a62e14bd45586beeec3f",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_minimal",
                "id": "EU:6000C29786f615663312af9d49bba1ef",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_minimal",
                "id": "EU:6000C2979e186bf7a61242f3bc49c945",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome_xrdp",
                "id": "EU:6000C297b448da1e088f8bc4eb0be63c",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_10_desktop_64-bit",
                "id": "EU:6000C2982b0030c2dbf98bcb092f92b4",
                "sizeGB": 25,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_basic_server",
                "id": "EU:6000C2982cc1f899e74c4f39a9e81998",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_32bit",
                "id": "EU:6000C2983bdd8b531ecfc6d892a35aa4",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_lemp-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU:6000C2983ff90afd6b38b5f897e32d06",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_nextcloud_nextcloud-15-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU:6000C2985991f64467b47d662bcb90bf",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_drupal_drupal-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU:6000C29863642e2615dcf655f5c2079f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.4_64-bit",
                "id": "EU:6000C2988f5660c446590588b456ba80",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_datacenter_64-bit",
                "id": "EU:6000C298abe9aa378af7832e3d7de7b6",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_64bit",
                "id": "EU:6000C298bb2e4ea0f1891cd81735d24e",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_16.04_64-bit",
                "id": "EU:6000C298bbb2d3b6e9721f4f4f3c5bf0",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_enterprise_64-bit",
                "id": "EU:6000C298c677d7da830e4f3ae1765c7e",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_ubuntu64",
                "id": "EU:6000C29919a41ecc0c790bf1437db1b0",
                "sizeGB": 15,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nOnce you have logged in, a simple console interface will appear and allow you to configure your site, ftp accounts, SSLs and more server configurations.\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_8.1_desktop_64-bit",
                "id": "EU:6000C2999afdfe69dc442ed1dcb26fa1",
                "sizeGB": 23,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_pfsense_2.4_64bit",
                "id": "EU:6000C299bd669da13cf92d780e19674d",
                "sizeGB": 2,
                "usageInfo": "Connect to the firewall using HTTPS protocol, \n\nhttps:\/\/{server-ip-address]\/\nUsername: admin\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_redis_redisserver-latest-ubuntuserver-18.04",
                "id": "EU:6000C299c73cf650577c6e9781938225",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_64-bit",
                "id": "EU:6000C299f04969dee8d55d2d3f0dbb96",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit",
                "id": "EU:6000C29a5a7220dcf84716e7bba74215",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_dockermachinecli-0.16-ubuntuserver-18.04",
                "id": "EU:6000C29a64893c54afb3950e87ba5724",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nfs_nfsserver-ubuntuserver-18.04",
                "id": "EU:6000C29a770013a930d717463fcad6a1",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_standard_64-bit",
                "id": "EU:6000C29a99c7cc5d67b773c85d017307",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_32-bit",
                "id": "EU:6000C29a9eb2046f9d486e0297051ec8",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_tomcat_tomcat-8-ubuntuserver-18.04",
                "id": "EU:6000C29ab1e22c5da5c8834442d97da7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_magento_magento-2.3-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU:6000C29ac6ac759b2ac9a121015cbe35",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-64-bit",
                "id": "EU:6000C29ad2662cd36cbf937fd7b46fd4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_redmine_redmine-4.0-ubuntuserver-18.04-mysqlserver-5.7",
                "id": "EU:6000C29b1af5c41bcfb0bfc9a8a09ff3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.6-ubuntuserver-18.04",
                "id": "EU:6000C29b30e4d970258a3e02b26f884a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_joomla_joomla-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU:6000C29b3a176f8fbeeaef8cabc285f7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_basic_server",
                "id": "EU:6000C29b6395b4cc22896d745fa1a5c4",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-csf-cmc-liveinstall-centos-7.4-64-bit-minimal",
                "id": "EU:6000C29b961d6c43182a64407d951542",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_64-bit",
                "id": "EU:6000C29bb8fde673f515caf9bed695a1",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_minimal",
                "id": "EU:6000C29c258bce8d868fa38afb946073",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_minio_minio-latest-ubuntuserver-18.04",
                "id": "EU:6000C29c540ff1dbace7682100bb3282",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_dokuwiki_dokuwiki-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "EU:6000C29c54ed40e5880c90ef8a6115bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_openvpn_openvpn-2.6.1-ubuntuserver-18.04",
                "id": "EU:6000C29c894a1cd4f38f1db3d72cc5ea",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_basic_server",
                "id": "EU:6000C29c9bfc5ab3a09ff3a80dfe46ce",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_desktop_7.4_64-bit_gnome",
                "id": "EU:6000C29ce092378f6d9f2985c7ebdb49",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_32-bit",
                "id": "EU:6000C29cebd37daa2ee4d7f6de19e931",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-8.0-ubuntuserver-18.04",
                "id": "EU:6000C29d16b1507a7a92873aa813eb0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_wordpress-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU:6000C29d365974def3ea2ae16eaa5f0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_64-bit",
                "id": "EU:6000C29d4049980bd16c74aa8ba91c9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpmyadmin_phpmyadmin-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "EU:6000C29d6adcf6f7bbc0b10a42860eda",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-5.7-ubuntuserver-18.04",
                "id": "EU:6000C29d9e2994c7ea6e03d8f470bda3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_standard_64-bit",
                "id": "EU:6000C29e684efebf574b286df3b4ff4f",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-11-ubuntuserver-18.04",
                "id": "EU:6000C29ea9dccc977a7cec3c16162d96",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_docker-ready-ubuntuserver-18.04",
                "id": "EU:6000C29f1950d63de8fed8095fdf6e64",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-32-bit",
                "id": "EU:6000C29f24bc8ec8a605b6d7bfe58835",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-dnsonly-liveinstall-centos-7.4_64-bit-minimal",
                "id": "EU:6000C29f5b14b91631c7678a2dc4b8cf",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-4.0-ubuntuserver-18.04",
                "id": "EU:6000C29f62a7292b19903fb7bdc4d7da",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.4-ubuntuserver-18.04",
                "id": "EU:6000C29fd761c6f26056d138e165b2bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            }
        ],
        "EU-FR": [
            {
                "description": "ubuntu_server_16.04_32-bit",
                "id": "EU-FR:6000C2901a61dff371f4d1d34bd9548b",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit_optimized_updated",
                "id": "EU-FR:6000C2904fc6d8295d2b6d9687ed955e",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_zevenet_zevenet-latest-ubuntuserver-18.04",
                "id": "EU-FR:6000C2909e0736f7b76b1dc70d11567e",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_memcached_memcached-latest-ubuntuserver-18.04",
                "id": "EU-FR:6000C290a79ae490560b068973cb35f9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_minimal",
                "id": "EU-FR:6000C291195abef23f2815c6f7cc301a",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome",
                "id": "EU-FR:6000C2914d34f8fb8b449a686c6df4a5",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_freenas_11.1_64bit",
                "id": "EU-FR:6000C2916500bde8a8dba053a727a2fd",
                "sizeGB": 2,
                "usageInfo": "FreeNAS is a free and open-source network-attached storage (NAS) software based on FreeBSD and the OpenZFS file system. Provides Storage Appliance supported SMB, AFP, NFS, iSCSI, SSH, rsync and FTP\/TFTP protocols. Advanced FreeNAS features include full-disk encryption and a plug-in architecture for third-party software.\n\nConnect to FreeNAS with HTTPS Protocol:\n\nhttps:\/\/{server-ip-address]\/\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_15.04_64-bit",
                "id": "EU-FR:6000C29188a2a1c97070d1d6fb71ee89",
                "sizeGB": 5,
                "usageInfo": "In order to connect to the server with SSH, use Putty SSH Client or any other SSH Client with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nYou can find the server\'s details below.",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_basic_server",
                "id": "EU-FR:6000C291a7dbc4a539dc4500ed1975c5",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-liveinstall-centos-7.4-64-bit-minimal",
                "id": "EU-FR:6000C291ac5094ec6fe3dabe0baca794",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_basic_server",
                "id": "EU-FR:6000C2924b678625c2b07d04b4978e18",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_nginx-mysql-php7",
                "id": "EU-FR:6000C2929e92b7444e77af9b149bc9f4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-7.4-64-bit",
                "id": "EU-FR:6000C2935944aaac4c21701d3cde9610",
                "sizeGB": 15,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.2-ubuntuserver-18.04",
                "id": "EU-FR:6000C29373bf2a83a8c8610ab80234e7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_32-bit",
                "id": "EU-FR:6000C29386a7def39b3fc7e4d88eba8c",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpbb_phpbb-3.2.5-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU-FR:6000C293bacc4ad2e026f66939baff71",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_standard_64-bit",
                "id": "EU-FR:6000C2947a5d7c8fead78a1ec1224fdf",
                "sizeGB": 23,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_datacenter_64-bit",
                "id": "EU-FR:6000C294fa713a5218e4d2fe9e6026c8",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_jenkins_jenkins-latest-ubuntuserver-18.04",
                "id": "EU-FR:6000C295159bc110a5482400667a7cd8",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_64-bit",
                "id": "EU-FR:6000C29541e39a9892043d7237503d06",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_desktop_8.6_64-bit_xfce4",
                "id": "EU-FR:6000C2956fdfc1fa3ffe061ba7bd46ce",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_64-bit",
                "id": "EU-FR:6000C29574cbda93387eac758727a6c9",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_32-bit",
                "id": "EU-FR:6000C295834b332b89f79521cdabca9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_datacenter_64-bit",
                "id": "EU-FR:6000C2960d7769492105a558d145c7d3",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)Username: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-10-ubuntuserver-18.04",
                "id": "EU-FR:6000C2967a1c0e996b1fadc4b42aa10f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_minimal",
                "id": "EU-FR:6000C296c816785af0416189ce873152",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_32-bit",
                "id": "EU-FR:6000C296d934a62e14bd45586beeec3f",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_minimal",
                "id": "EU-FR:6000C29786f615663312af9d49bba1ef",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_minimal",
                "id": "EU-FR:6000C2979e186bf7a61242f3bc49c945",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome_xrdp",
                "id": "EU-FR:6000C297b448da1e088f8bc4eb0be63c",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_10_desktop_64-bit",
                "id": "EU-FR:6000C2982b0030c2dbf98bcb092f92b4",
                "sizeGB": 25,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_basic_server",
                "id": "EU-FR:6000C2982cc1f899e74c4f39a9e81998",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_32bit",
                "id": "EU-FR:6000C2983bdd8b531ecfc6d892a35aa4",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_lemp-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU-FR:6000C2983ff90afd6b38b5f897e32d06",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_nextcloud_nextcloud-15-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU-FR:6000C2985991f64467b47d662bcb90bf",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_drupal_drupal-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU-FR:6000C29863642e2615dcf655f5c2079f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.4_64-bit",
                "id": "EU-FR:6000C2988f5660c446590588b456ba80",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_datacenter_64-bit",
                "id": "EU-FR:6000C298abe9aa378af7832e3d7de7b6",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_64bit",
                "id": "EU-FR:6000C298bb2e4ea0f1891cd81735d24e",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_16.04_64-bit",
                "id": "EU-FR:6000C298bbb2d3b6e9721f4f4f3c5bf0",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_enterprise_64-bit",
                "id": "EU-FR:6000C298c677d7da830e4f3ae1765c7e",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_ubuntu64",
                "id": "EU-FR:6000C29919a41ecc0c790bf1437db1b0",
                "sizeGB": 15,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nOnce you have logged in, a simple console interface will appear and allow you to configure your site, ftp accounts, SSLs and more server configurations.\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_8.1_desktop_64-bit",
                "id": "EU-FR:6000C2999afdfe69dc442ed1dcb26fa1",
                "sizeGB": 23,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_pfsense_2.4_64bit",
                "id": "EU-FR:6000C299bd669da13cf92d780e19674d",
                "sizeGB": 2,
                "usageInfo": "Connect to the firewall using HTTPS protocol, \n\nhttps:\/\/{server-ip-address]\/\nUsername: admin\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_redis_redisserver-latest-ubuntuserver-18.04",
                "id": "EU-FR:6000C299c73cf650577c6e9781938225",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_64-bit",
                "id": "EU-FR:6000C299f04969dee8d55d2d3f0dbb96",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit",
                "id": "EU-FR:6000C29a5a7220dcf84716e7bba74215",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_dockermachinecli-0.16-ubuntuserver-18.04",
                "id": "EU-FR:6000C29a64893c54afb3950e87ba5724",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nfs_nfsserver-ubuntuserver-18.04",
                "id": "EU-FR:6000C29a770013a930d717463fcad6a1",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_standard_64-bit",
                "id": "EU-FR:6000C29a99c7cc5d67b773c85d017307",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_32-bit",
                "id": "EU-FR:6000C29a9eb2046f9d486e0297051ec8",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_tomcat_tomcat-8-ubuntuserver-18.04",
                "id": "EU-FR:6000C29ab1e22c5da5c8834442d97da7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_magento_magento-2.3-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU-FR:6000C29ac6ac759b2ac9a121015cbe35",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-64-bit",
                "id": "EU-FR:6000C29ad2662cd36cbf937fd7b46fd4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_redmine_redmine-4.0-ubuntuserver-18.04-mysqlserver-5.7",
                "id": "EU-FR:6000C29b1af5c41bcfb0bfc9a8a09ff3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.6-ubuntuserver-18.04",
                "id": "EU-FR:6000C29b30e4d970258a3e02b26f884a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_joomla_joomla-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU-FR:6000C29b3a176f8fbeeaef8cabc285f7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_basic_server",
                "id": "EU-FR:6000C29b6395b4cc22896d745fa1a5c4",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-csf-cmc-liveinstall-centos-7.4-64-bit-minimal",
                "id": "EU-FR:6000C29b961d6c43182a64407d951542",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_64-bit",
                "id": "EU-FR:6000C29bb8fde673f515caf9bed695a1",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_minimal",
                "id": "EU-FR:6000C29c258bce8d868fa38afb946073",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_minio_minio-latest-ubuntuserver-18.04",
                "id": "EU-FR:6000C29c540ff1dbace7682100bb3282",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_dokuwiki_dokuwiki-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "EU-FR:6000C29c54ed40e5880c90ef8a6115bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_openvpn_openvpn-2.6.1-ubuntuserver-18.04",
                "id": "EU-FR:6000C29c894a1cd4f38f1db3d72cc5ea",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_basic_server",
                "id": "EU-FR:6000C29c9bfc5ab3a09ff3a80dfe46ce",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_desktop_7.4_64-bit_gnome",
                "id": "EU-FR:6000C29ce092378f6d9f2985c7ebdb49",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_32-bit",
                "id": "EU-FR:6000C29cebd37daa2ee4d7f6de19e931",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-8.0-ubuntuserver-18.04",
                "id": "EU-FR:6000C29d16b1507a7a92873aa813eb0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_wordpress-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU-FR:6000C29d365974def3ea2ae16eaa5f0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_64-bit",
                "id": "EU-FR:6000C29d4049980bd16c74aa8ba91c9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpmyadmin_phpmyadmin-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "EU-FR:6000C29d6adcf6f7bbc0b10a42860eda",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-5.7-ubuntuserver-18.04",
                "id": "EU-FR:6000C29d9e2994c7ea6e03d8f470bda3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_standard_64-bit",
                "id": "EU-FR:6000C29e684efebf574b286df3b4ff4f",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-11-ubuntuserver-18.04",
                "id": "EU-FR:6000C29ea9dccc977a7cec3c16162d96",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_docker-ready-ubuntuserver-18.04",
                "id": "EU-FR:6000C29f1950d63de8fed8095fdf6e64",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-32-bit",
                "id": "EU-FR:6000C29f24bc8ec8a605b6d7bfe58835",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-dnsonly-liveinstall-centos-7.4_64-bit-minimal",
                "id": "EU-FR:6000C29f5b14b91631c7678a2dc4b8cf",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-4.0-ubuntuserver-18.04",
                "id": "EU-FR:6000C29f62a7292b19903fb7bdc4d7da",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.4-ubuntuserver-18.04",
                "id": "EU-FR:6000C29fd761c6f26056d138e165b2bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            }
        ],
        "EU-LO": [
            {
                "description": "ubuntu_server_16.04_32-bit",
                "id": "EU-LO:6000C2901a61dff371f4d1d34bd9548b",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit_optimized_updated",
                "id": "EU-LO:6000C2904fc6d8295d2b6d9687ed955e",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_zevenet_zevenet-latest-ubuntuserver-18.04",
                "id": "EU-LO:6000C2909e0736f7b76b1dc70d11567e",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_memcached_memcached-latest-ubuntuserver-18.04",
                "id": "EU-LO:6000C290a79ae490560b068973cb35f9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_minimal",
                "id": "EU-LO:6000C291195abef23f2815c6f7cc301a",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome",
                "id": "EU-LO:6000C2914d34f8fb8b449a686c6df4a5",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_freenas_11.1_64bit",
                "id": "EU-LO:6000C2916500bde8a8dba053a727a2fd",
                "sizeGB": 2,
                "usageInfo": "FreeNAS is a free and open-source network-attached storage (NAS) software based on FreeBSD and the OpenZFS file system. Provides Storage Appliance supported SMB, AFP, NFS, iSCSI, SSH, rsync and FTP\/TFTP protocols. Advanced FreeNAS features include full-disk encryption and a plug-in architecture for third-party software.\n\nConnect to FreeNAS with HTTPS Protocol:\n\nhttps:\/\/{server-ip-address]\/\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_15.04_64-bit",
                "id": "EU-LO:6000C29188a2a1c97070d1d6fb71ee89",
                "sizeGB": 5,
                "usageInfo": "In order to connect to the server with SSH, use Putty SSH Client or any other SSH Client with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nYou can find the server\'s details below.",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_basic_server",
                "id": "EU-LO:6000C291a7dbc4a539dc4500ed1975c5",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-liveinstall-centos-7.4-64-bit-minimal",
                "id": "EU-LO:6000C291ac5094ec6fe3dabe0baca794",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_basic_server",
                "id": "EU-LO:6000C2924b678625c2b07d04b4978e18",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_nginx-mysql-php7",
                "id": "EU-LO:6000C2929e92b7444e77af9b149bc9f4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-7.4-64-bit",
                "id": "EU-LO:6000C2935944aaac4c21701d3cde9610",
                "sizeGB": 15,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.2-ubuntuserver-18.04",
                "id": "EU-LO:6000C29373bf2a83a8c8610ab80234e7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_32-bit",
                "id": "EU-LO:6000C29386a7def39b3fc7e4d88eba8c",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpbb_phpbb-3.2.5-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU-LO:6000C293bacc4ad2e026f66939baff71",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_standard_64-bit",
                "id": "EU-LO:6000C2947a5d7c8fead78a1ec1224fdf",
                "sizeGB": 23,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_datacenter_64-bit",
                "id": "EU-LO:6000C294fa713a5218e4d2fe9e6026c8",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_jenkins_jenkins-latest-ubuntuserver-18.04",
                "id": "EU-LO:6000C295159bc110a5482400667a7cd8",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_64-bit",
                "id": "EU-LO:6000C29541e39a9892043d7237503d06",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_desktop_8.6_64-bit_xfce4",
                "id": "EU-LO:6000C2956fdfc1fa3ffe061ba7bd46ce",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_64-bit",
                "id": "EU-LO:6000C29574cbda93387eac758727a6c9",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_32-bit",
                "id": "EU-LO:6000C295834b332b89f79521cdabca9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_datacenter_64-bit",
                "id": "EU-LO:6000C2960d7769492105a558d145c7d3",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)Username: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-10-ubuntuserver-18.04",
                "id": "EU-LO:6000C2967a1c0e996b1fadc4b42aa10f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_minimal",
                "id": "EU-LO:6000C296c816785af0416189ce873152",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_32-bit",
                "id": "EU-LO:6000C296d934a62e14bd45586beeec3f",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_minimal",
                "id": "EU-LO:6000C29786f615663312af9d49bba1ef",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_minimal",
                "id": "EU-LO:6000C2979e186bf7a61242f3bc49c945",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome_xrdp",
                "id": "EU-LO:6000C297b448da1e088f8bc4eb0be63c",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_10_desktop_64-bit",
                "id": "EU-LO:6000C2982b0030c2dbf98bcb092f92b4",
                "sizeGB": 25,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_basic_server",
                "id": "EU-LO:6000C2982cc1f899e74c4f39a9e81998",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_32bit",
                "id": "EU-LO:6000C2983bdd8b531ecfc6d892a35aa4",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_lemp-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU-LO:6000C2983ff90afd6b38b5f897e32d06",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_nextcloud_nextcloud-15-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU-LO:6000C2985991f64467b47d662bcb90bf",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_drupal_drupal-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU-LO:6000C29863642e2615dcf655f5c2079f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.4_64-bit",
                "id": "EU-LO:6000C2988f5660c446590588b456ba80",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_datacenter_64-bit",
                "id": "EU-LO:6000C298abe9aa378af7832e3d7de7b6",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_64bit",
                "id": "EU-LO:6000C298bb2e4ea0f1891cd81735d24e",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_16.04_64-bit",
                "id": "EU-LO:6000C298bbb2d3b6e9721f4f4f3c5bf0",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_enterprise_64-bit",
                "id": "EU-LO:6000C298c677d7da830e4f3ae1765c7e",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_ubuntu64",
                "id": "EU-LO:6000C29919a41ecc0c790bf1437db1b0",
                "sizeGB": 15,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nOnce you have logged in, a simple console interface will appear and allow you to configure your site, ftp accounts, SSLs and more server configurations.\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_8.1_desktop_64-bit",
                "id": "EU-LO:6000C2999afdfe69dc442ed1dcb26fa1",
                "sizeGB": 23,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_pfsense_2.4_64bit",
                "id": "EU-LO:6000C299bd669da13cf92d780e19674d",
                "sizeGB": 2,
                "usageInfo": "Connect to the firewall using HTTPS protocol, \n\nhttps:\/\/{server-ip-address]\/\nUsername: admin\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_redis_redisserver-latest-ubuntuserver-18.04",
                "id": "EU-LO:6000C299c73cf650577c6e9781938225",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_64-bit",
                "id": "EU-LO:6000C299f04969dee8d55d2d3f0dbb96",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit",
                "id": "EU-LO:6000C29a5a7220dcf84716e7bba74215",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_dockermachinecli-0.16-ubuntuserver-18.04",
                "id": "EU-LO:6000C29a64893c54afb3950e87ba5724",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nfs_nfsserver-ubuntuserver-18.04",
                "id": "EU-LO:6000C29a770013a930d717463fcad6a1",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_standard_64-bit",
                "id": "EU-LO:6000C29a99c7cc5d67b773c85d017307",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_32-bit",
                "id": "EU-LO:6000C29a9eb2046f9d486e0297051ec8",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_tomcat_tomcat-8-ubuntuserver-18.04",
                "id": "EU-LO:6000C29ab1e22c5da5c8834442d97da7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_magento_magento-2.3-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU-LO:6000C29ac6ac759b2ac9a121015cbe35",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-64-bit",
                "id": "EU-LO:6000C29ad2662cd36cbf937fd7b46fd4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_redmine_redmine-4.0-ubuntuserver-18.04-mysqlserver-5.7",
                "id": "EU-LO:6000C29b1af5c41bcfb0bfc9a8a09ff3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.6-ubuntuserver-18.04",
                "id": "EU-LO:6000C29b30e4d970258a3e02b26f884a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_joomla_joomla-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU-LO:6000C29b3a176f8fbeeaef8cabc285f7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_basic_server",
                "id": "EU-LO:6000C29b6395b4cc22896d745fa1a5c4",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-csf-cmc-liveinstall-centos-7.4-64-bit-minimal",
                "id": "EU-LO:6000C29b961d6c43182a64407d951542",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_64-bit",
                "id": "EU-LO:6000C29bb8fde673f515caf9bed695a1",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_minimal",
                "id": "EU-LO:6000C29c258bce8d868fa38afb946073",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_minio_minio-latest-ubuntuserver-18.04",
                "id": "EU-LO:6000C29c540ff1dbace7682100bb3282",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_dokuwiki_dokuwiki-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "EU-LO:6000C29c54ed40e5880c90ef8a6115bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_openvpn_openvpn-2.6.1-ubuntuserver-18.04",
                "id": "EU-LO:6000C29c894a1cd4f38f1db3d72cc5ea",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_basic_server",
                "id": "EU-LO:6000C29c9bfc5ab3a09ff3a80dfe46ce",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_desktop_7.4_64-bit_gnome",
                "id": "EU-LO:6000C29ce092378f6d9f2985c7ebdb49",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_32-bit",
                "id": "EU-LO:6000C29cebd37daa2ee4d7f6de19e931",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-8.0-ubuntuserver-18.04",
                "id": "EU-LO:6000C29d16b1507a7a92873aa813eb0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_wordpress-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "EU-LO:6000C29d365974def3ea2ae16eaa5f0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_64-bit",
                "id": "EU-LO:6000C29d4049980bd16c74aa8ba91c9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpmyadmin_phpmyadmin-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "EU-LO:6000C29d6adcf6f7bbc0b10a42860eda",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-5.7-ubuntuserver-18.04",
                "id": "EU-LO:6000C29d9e2994c7ea6e03d8f470bda3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_standard_64-bit",
                "id": "EU-LO:6000C29e684efebf574b286df3b4ff4f",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-11-ubuntuserver-18.04",
                "id": "EU-LO:6000C29ea9dccc977a7cec3c16162d96",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_docker-ready-ubuntuserver-18.04",
                "id": "EU-LO:6000C29f1950d63de8fed8095fdf6e64",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-32-bit",
                "id": "EU-LO:6000C29f24bc8ec8a605b6d7bfe58835",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-dnsonly-liveinstall-centos-7.4_64-bit-minimal",
                "id": "EU-LO:6000C29f5b14b91631c7678a2dc4b8cf",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-4.0-ubuntuserver-18.04",
                "id": "EU-LO:6000C29f62a7292b19903fb7bdc4d7da",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.4-ubuntuserver-18.04",
                "id": "EU-LO:6000C29fd761c6f26056d138e165b2bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            }
        ],
        "IL": [
            {
                "description": "ubuntu_server_16.04_32-bit",
                "id": "IL:6000C2901a61dff371f4d1d34bd9548b",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_docker_docker-ready-ubuntuserver-18.04",
                "id": "IL:6000C29042744897367842a3114ed603",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit_optimized_updated",
                "id": "IL:6000C2904fc6d8295d2b6d9687ed955e",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_memcached_memcached-latest-ubuntuserver-18.04",
                "id": "IL:6000C290a79ae490560b068973cb35f9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_minimal",
                "id": "IL:6000C291195abef23f2815c6f7cc301a",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome",
                "id": "IL:6000C2914d34f8fb8b449a686c6df4a5",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_mongodb_mongodb-4.0-ubuntuserver-18.04",
                "id": "IL:6000C2915051451c038e9068a896acbf",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_freenas_11.1_64bit",
                "id": "IL:6000C2916500bde8a8dba053a727a2fd",
                "sizeGB": 2,
                "usageInfo": "FreeNAS is a free and open-source network-attached storage (NAS) software based on FreeBSD and the OpenZFS file system. Provides Storage Appliance supported SMB, AFP, NFS, iSCSI, SSH, rsync and FTP\/TFTP protocols. Advanced FreeNAS features include full-disk encryption and a plug-in architecture for third-party software.\n\nConnect to FreeNAS with HTTPS Protocol:\n\nhttps:\/\/{server-ip-address]\/\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_lemp_lemp-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL:6000C29177226d6f81efee9e4a9895ed",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_15.04_64-bit",
                "id": "IL:6000C29188a2a1c97070d1d6fb71ee89",
                "sizeGB": 5,
                "usageInfo": "In order to connect to the server with SSH, use Putty SSH Client or any other SSH Client with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nYou can find the server\'s details below.",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_basic_server",
                "id": "IL:6000C291a7dbc4a539dc4500ed1975c5",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_zevenet_zevenet-latest-ubuntuserver-18.04",
                "id": "IL:6000C291a8234ce6f5d43933f8fc25f3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-liveinstall-centos-7.4-64-bit-minimal",
                "id": "IL:6000C291ac5094ec6fe3dabe0baca794",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_jenkins_jenkins-latest-ubuntuserver-18.04",
                "id": "IL:6000C291b095fdd285db51728154e601",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_docker_dockermachinecli-0.16-ubuntuserver-18.04",
                "id": "IL:6000C2920fb14e7c7426309088e24a22",
                "sizeGB": 4,
                "usageInfo": "Usage Info Example",
                "guestDescription": "Guest Description Example",
                "freeTextOne": "Free Text 1 Example",
                "freeTextTwo": "Free Text 2 Example"
            },
            {
                "description": "apps_staging_phpmyadmin_phpmyadmin-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "IL:6000C2921d094306cbfd50bfa745dabb",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_basic_server",
                "id": "IL:6000C2924b678625c2b07d04b4978e18",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_nginx-mysql-php7",
                "id": "IL:6000C2929e92b7444e77af9b149bc9f4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_mongodb_mongodb-3.2-ubuntuserver-18.04",
                "id": "IL:6000C292bf5dc7c56e626c665e2ce574",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_redis_redisserver-latest-ubuntuserver-18.04",
                "id": "IL:6000C292dfce6f7d227760aa226a837a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_cpanelwhm_cpanelwhm-csf-cmc-liveinstall-centos-7.4-64-bit-minimal",
                "id": "IL:6000C2932e7505f225211ca136785531",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_mongodb_mongodb-3.6-ubuntuserver-18.04",
                "id": "IL:6000C29353e4a9a29f9adfd18104c48a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-7.4-64-bit",
                "id": "IL:6000C2935944aaac4c21701d3cde9610",
                "sizeGB": 15,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_nodejs_nodejs-10-ubuntuserver-18.04",
                "id": "IL:6000C2937089a05d8f37643d3b3a631d",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.2-ubuntuserver-18.04",
                "id": "IL:6000C29373bf2a83a8c8610ab80234e7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_32-bit",
                "id": "IL:6000C29386a7def39b3fc7e4d88eba8c",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpbb_phpbb-3.2.5-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL:6000C293bacc4ad2e026f66939baff71",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_mysql_mysqlserver-5.7-ubuntuserver-18.04",
                "id": "IL:6000C29417c8f6a8d92c550cfc645cdb",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_standard_64-bit",
                "id": "IL:6000C2947a5d7c8fead78a1ec1224fdf",
                "sizeGB": 23,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_datacenter_64-bit",
                "id": "IL:6000C294fa713a5218e4d2fe9e6026c8",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_jenkins_jenkins-latest-ubuntuserver-18.04",
                "id": "IL:6000C295159bc110a5482400667a7cd8",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_64-bit",
                "id": "IL:6000C29541e39a9892043d7237503d06",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_desktop_8.6_64-bit_xfce4",
                "id": "IL:6000C2956fdfc1fa3ffe061ba7bd46ce",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_64-bit",
                "id": "IL:6000C29574cbda93387eac758727a6c9",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_32-bit",
                "id": "IL:6000C295834b332b89f79521cdabca9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_drupal_drupal-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL:6000C2959f91a4459abf5c368b6fc891",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_mongodb_mongodb-3.4-ubuntuserver-18.04",
                "id": "IL:6000C295c575602fb61c8cebfe31379e",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_datacenter_64-bit",
                "id": "IL:6000C2960d7769492105a558d145c7d3",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)Username: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-10-ubuntuserver-18.04",
                "id": "IL:6000C2967a1c0e996b1fadc4b42aa10f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_minimal",
                "id": "IL:6000C296c816785af0416189ce873152",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_32-bit",
                "id": "IL:6000C296d934a62e14bd45586beeec3f",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_openvpn_openvpn-2.6.1-ubuntuserver-18.04",
                "id": "IL:6000C296fe123fd572631d1c10eea282",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_joomla_joomla-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL:6000C297680952f5b68b4fe6eb61bad9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_minimal",
                "id": "IL:6000C29786f615663312af9d49bba1ef",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_nfs_nfsserver-ubuntuserver-18.04",
                "id": "IL:6000C297904364052faf1731636d492f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_minimal",
                "id": "IL:6000C2979e186bf7a61242f3bc49c945",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_cpanelwhm_cpanelwhm-liveinstall-centos-7.4-64-bit-minimal",
                "id": "IL:6000C297a7674ced78cb8369678f955f",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_minio_minio-latest-ubuntuserver-18.04",
                "id": "IL:6000C297b1e34acd5dc8fb699b6a2a03",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome_xrdp",
                "id": "IL:6000C297b448da1e088f8bc4eb0be63c",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_10_desktop_64-bit",
                "id": "IL:6000C2982b0030c2dbf98bcb092f92b4",
                "sizeGB": 25,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_basic_server",
                "id": "IL:6000C2982cc1f899e74c4f39a9e81998",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_32bit",
                "id": "IL:6000C2983bdd8b531ecfc6d892a35aa4",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_lemp-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL:6000C2983ff90afd6b38b5f897e32d06",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_mysql_mysqlserver-8.0-ubuntuserver-18.04",
                "id": "IL:6000C29847ce4f9dc4ec589873fce27b",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_nextcloud_nextcloud-15-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL:6000C2985991f64467b47d662bcb90bf",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_drupal_drupal-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL:6000C29863642e2615dcf655f5c2079f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.4_64-bit",
                "id": "IL:6000C2988f5660c446590588b456ba80",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_datacenter_64-bit",
                "id": "IL:6000C298abe9aa378af7832e3d7de7b6",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_64bit",
                "id": "IL:6000C298bb2e4ea0f1891cd81735d24e",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_16.04_64-bit",
                "id": "IL:6000C298bbb2d3b6e9721f4f4f3c5bf0",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_enterprise_64-bit",
                "id": "IL:6000C298c677d7da830e4f3ae1765c7e",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_magento_magento-2.3-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL:6000C29909ff45737192465f32d99031",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_phpbb_phpbb-3.2.5-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL:6000C29912777111357dbbb4c5a960c7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_ubuntu64",
                "id": "IL:6000C29919a41ecc0c790bf1437db1b0",
                "sizeGB": 15,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nOnce you have logged in, a simple console interface will appear and allow you to configure your site, ftp accounts, SSLs and more server configurations.\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_8.1_desktop_64-bit",
                "id": "IL:6000C2999afdfe69dc442ed1dcb26fa1",
                "sizeGB": 23,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_nextcloud_nextcloud-15-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL:6000C299bb94d916588a68dea1d7b682",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_pfsense_2.4_64bit",
                "id": "IL:6000C299bd669da13cf92d780e19674d",
                "sizeGB": 2,
                "usageInfo": "Connect to the firewall using HTTPS protocol, \n\nhttps:\/\/{server-ip-address]\/\nUsername: admin\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_redis_redisserver-latest-ubuntuserver-18.04",
                "id": "IL:6000C299c73cf650577c6e9781938225",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_64-bit",
                "id": "IL:6000C299f04969dee8d55d2d3f0dbb96",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_ubuntu_server_18.04_64-bit_updated_optimized",
                "id": "IL:6000C299f28b1df63593cab9df49d1ac",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit",
                "id": "IL:6000C29a5a7220dcf84716e7bba74215",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_dockermachinecli-0.16-ubuntuserver-18.04",
                "id": "IL:6000C29a64893c54afb3950e87ba5724",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nfs_nfsserver-ubuntuserver-18.04",
                "id": "IL:6000C29a770013a930d717463fcad6a1",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_standard_64-bit",
                "id": "IL:6000C29a99c7cc5d67b773c85d017307",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_32-bit",
                "id": "IL:6000C29a9eb2046f9d486e0297051ec8",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_tomcat_tomcat-8-ubuntuserver-18.04",
                "id": "IL:6000C29ab1e22c5da5c8834442d97da7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_magento_magento-2.3-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL:6000C29ac6ac759b2ac9a121015cbe35",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-64-bit",
                "id": "IL:6000C29ad2662cd36cbf937fd7b46fd4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_redmine_redmine-4.0-ubuntuserver-18.04-mysqlserver-5.7",
                "id": "IL:6000C29b1af5c41bcfb0bfc9a8a09ff3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_wordpress_wordpress-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL:6000C29b224e9c3665985adcebc743b3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.6-ubuntuserver-18.04",
                "id": "IL:6000C29b30e4d970258a3e02b26f884a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_joomla_joomla-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL:6000C29b3a176f8fbeeaef8cabc285f7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_basic_server",
                "id": "IL:6000C29b6395b4cc22896d745fa1a5c4",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-csf-cmc-liveinstall-centos-7.4-64-bit-minimal",
                "id": "IL:6000C29b961d6c43182a64407d951542",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_memcached_memcached-latest-ubuntuserver-18.04",
                "id": "IL:6000C29ba127ebc145d9442abab83bf1",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_64-bit",
                "id": "IL:6000C29bb8fde673f515caf9bed695a1",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_minimal",
                "id": "IL:6000C29c258bce8d868fa38afb946073",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_minio_minio-latest-ubuntuserver-18.04",
                "id": "IL:6000C29c540ff1dbace7682100bb3282",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_dokuwiki_dokuwiki-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "IL:6000C29c54ed40e5880c90ef8a6115bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_openvpn_openvpn-2.6.1-ubuntuserver-18.04",
                "id": "IL:6000C29c894a1cd4f38f1db3d72cc5ea",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_basic_server",
                "id": "IL:6000C29c9bfc5ab3a09ff3a80dfe46ce",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_desktop_7.4_64-bit_gnome",
                "id": "IL:6000C29ce092378f6d9f2985c7ebdb49",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_32-bit",
                "id": "IL:6000C29cebd37daa2ee4d7f6de19e931",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-8.0-ubuntuserver-18.04",
                "id": "IL:6000C29d16b1507a7a92873aa813eb0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_wordpress-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL:6000C29d365974def3ea2ae16eaa5f0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_64-bit",
                "id": "IL:6000C29d4049980bd16c74aa8ba91c9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpmyadmin_phpmyadmin-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "IL:6000C29d6adcf6f7bbc0b10a42860eda",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-5.7-ubuntuserver-18.04",
                "id": "IL:6000C29d9e2994c7ea6e03d8f470bda3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_tomcat_tomcat-8-ubuntuserver-18.04",
                "id": "IL:6000C29dd0e8d2ccdf5679d8b0080a5d",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_redmine_redmine-4.0-ubuntuserver-18.04-mysqlserver-5.7",
                "id": "IL:6000C29e0706116220adb12b1eede9ef",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_standard_64-bit",
                "id": "IL:6000C29e684efebf574b286df3b4ff4f",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-11-ubuntuserver-18.04",
                "id": "IL:6000C29ea9dccc977a7cec3c16162d96",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_dokuwiki_dokuwiki-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "IL:6000C29efa783e55ad18a3f4e9ce85e9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_docker-ready-ubuntuserver-18.04",
                "id": "IL:6000C29f1950d63de8fed8095fdf6e64",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-32-bit",
                "id": "IL:6000C29f24bc8ec8a605b6d7bfe58835",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-dnsonly-liveinstall-centos-7.4_64-bit-minimal",
                "id": "IL:6000C29f5b14b91631c7678a2dc4b8cf",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-4.0-ubuntuserver-18.04",
                "id": "IL:6000C29f62a7292b19903fb7bdc4d7da",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_staging_nodejs_nodejs-11-ubuntuserver-18.04",
                "id": "IL:6000C29fbe10c098c8d8520c617de339",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.4-ubuntuserver-18.04",
                "id": "IL:6000C29fd761c6f26056d138e165b2bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            }
        ],
        "IL-JR": [
            {
                "description": "ubuntu_server_16.04_32-bit",
                "id": "IL-JR:6000C2901a61dff371f4d1d34bd9548b",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit_optimized_updated",
                "id": "IL-JR:6000C2904fc6d8295d2b6d9687ed955e",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_zevenet_zevenet-latest-ubuntuserver-18.04",
                "id": "IL-JR:6000C2909e0736f7b76b1dc70d11567e",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_memcached_memcached-latest-ubuntuserver-18.04",
                "id": "IL-JR:6000C290a79ae490560b068973cb35f9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_minimal",
                "id": "IL-JR:6000C291195abef23f2815c6f7cc301a",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome",
                "id": "IL-JR:6000C2914d34f8fb8b449a686c6df4a5",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_freenas_11.1_64bit",
                "id": "IL-JR:6000C2916500bde8a8dba053a727a2fd",
                "sizeGB": 2,
                "usageInfo": "FreeNAS is a free and open-source network-attached storage (NAS) software based on FreeBSD and the OpenZFS file system. Provides Storage Appliance supported SMB, AFP, NFS, iSCSI, SSH, rsync and FTP\/TFTP protocols. Advanced FreeNAS features include full-disk encryption and a plug-in architecture for third-party software.\n\nConnect to FreeNAS with HTTPS Protocol:\n\nhttps:\/\/{server-ip-address]\/\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_15.04_64-bit",
                "id": "IL-JR:6000C29188a2a1c97070d1d6fb71ee89",
                "sizeGB": 5,
                "usageInfo": "In order to connect to the server with SSH, use Putty SSH Client or any other SSH Client with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nYou can find the server\'s details below.",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_basic_server",
                "id": "IL-JR:6000C291a7dbc4a539dc4500ed1975c5",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-liveinstall-centos-7.4-64-bit-minimal",
                "id": "IL-JR:6000C291ac5094ec6fe3dabe0baca794",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_basic_server",
                "id": "IL-JR:6000C2924b678625c2b07d04b4978e18",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_nginx-mysql-php7",
                "id": "IL-JR:6000C2929e92b7444e77af9b149bc9f4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-7.4-64-bit",
                "id": "IL-JR:6000C2935944aaac4c21701d3cde9610",
                "sizeGB": 15,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.2-ubuntuserver-18.04",
                "id": "IL-JR:6000C29373bf2a83a8c8610ab80234e7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_32-bit",
                "id": "IL-JR:6000C29386a7def39b3fc7e4d88eba8c",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpbb_phpbb-3.2.5-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-JR:6000C293bacc4ad2e026f66939baff71",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_standard_64-bit",
                "id": "IL-JR:6000C2947a5d7c8fead78a1ec1224fdf",
                "sizeGB": 23,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_datacenter_64-bit",
                "id": "IL-JR:6000C294fa713a5218e4d2fe9e6026c8",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_jenkins_jenkins-latest-ubuntuserver-18.04",
                "id": "IL-JR:6000C295159bc110a5482400667a7cd8",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_64-bit",
                "id": "IL-JR:6000C29541e39a9892043d7237503d06",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_desktop_8.6_64-bit_xfce4",
                "id": "IL-JR:6000C2956fdfc1fa3ffe061ba7bd46ce",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_64-bit",
                "id": "IL-JR:6000C29574cbda93387eac758727a6c9",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_32-bit",
                "id": "IL-JR:6000C295834b332b89f79521cdabca9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_datacenter_64-bit",
                "id": "IL-JR:6000C2960d7769492105a558d145c7d3",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)Username: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-10-ubuntuserver-18.04",
                "id": "IL-JR:6000C2967a1c0e996b1fadc4b42aa10f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_minimal",
                "id": "IL-JR:6000C296c816785af0416189ce873152",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_32-bit",
                "id": "IL-JR:6000C296d934a62e14bd45586beeec3f",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_minimal",
                "id": "IL-JR:6000C29786f615663312af9d49bba1ef",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_minimal",
                "id": "IL-JR:6000C2979e186bf7a61242f3bc49c945",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome_xrdp",
                "id": "IL-JR:6000C297b448da1e088f8bc4eb0be63c",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_10_desktop_64-bit",
                "id": "IL-JR:6000C2982b0030c2dbf98bcb092f92b4",
                "sizeGB": 25,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_basic_server",
                "id": "IL-JR:6000C2982cc1f899e74c4f39a9e81998",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_32bit",
                "id": "IL-JR:6000C2983bdd8b531ecfc6d892a35aa4",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_lemp-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-JR:6000C2983ff90afd6b38b5f897e32d06",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_nextcloud_nextcloud-15-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-JR:6000C2985991f64467b47d662bcb90bf",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_drupal_drupal-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-JR:6000C29863642e2615dcf655f5c2079f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.4_64-bit",
                "id": "IL-JR:6000C2988f5660c446590588b456ba80",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_datacenter_64-bit",
                "id": "IL-JR:6000C298abe9aa378af7832e3d7de7b6",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_64bit",
                "id": "IL-JR:6000C298bb2e4ea0f1891cd81735d24e",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_16.04_64-bit",
                "id": "IL-JR:6000C298bbb2d3b6e9721f4f4f3c5bf0",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_enterprise_64-bit",
                "id": "IL-JR:6000C298c677d7da830e4f3ae1765c7e",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_ubuntu64",
                "id": "IL-JR:6000C29919a41ecc0c790bf1437db1b0",
                "sizeGB": 15,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nOnce you have logged in, a simple console interface will appear and allow you to configure your site, ftp accounts, SSLs and more server configurations.\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_8.1_desktop_64-bit",
                "id": "IL-JR:6000C2999afdfe69dc442ed1dcb26fa1",
                "sizeGB": 23,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_pfsense_2.4_64bit",
                "id": "IL-JR:6000C299bd669da13cf92d780e19674d",
                "sizeGB": 2,
                "usageInfo": "Connect to the firewall using HTTPS protocol, \n\nhttps:\/\/{server-ip-address]\/\nUsername: admin\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_redis_redisserver-latest-ubuntuserver-18.04",
                "id": "IL-JR:6000C299c73cf650577c6e9781938225",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_64-bit",
                "id": "IL-JR:6000C299f04969dee8d55d2d3f0dbb96",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit",
                "id": "IL-JR:6000C29a5a7220dcf84716e7bba74215",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_dockermachinecli-0.16-ubuntuserver-18.04",
                "id": "IL-JR:6000C29a64893c54afb3950e87ba5724",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nfs_nfsserver-ubuntuserver-18.04",
                "id": "IL-JR:6000C29a770013a930d717463fcad6a1",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_standard_64-bit",
                "id": "IL-JR:6000C29a99c7cc5d67b773c85d017307",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_32-bit",
                "id": "IL-JR:6000C29a9eb2046f9d486e0297051ec8",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_tomcat_tomcat-8-ubuntuserver-18.04",
                "id": "IL-JR:6000C29ab1e22c5da5c8834442d97da7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_magento_magento-2.3-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-JR:6000C29ac6ac759b2ac9a121015cbe35",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-64-bit",
                "id": "IL-JR:6000C29ad2662cd36cbf937fd7b46fd4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_redmine_redmine-4.0-ubuntuserver-18.04-mysqlserver-5.7",
                "id": "IL-JR:6000C29b1af5c41bcfb0bfc9a8a09ff3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.6-ubuntuserver-18.04",
                "id": "IL-JR:6000C29b30e4d970258a3e02b26f884a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_joomla_joomla-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-JR:6000C29b3a176f8fbeeaef8cabc285f7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_basic_server",
                "id": "IL-JR:6000C29b6395b4cc22896d745fa1a5c4",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-csf-cmc-liveinstall-centos-7.4-64-bit-minimal",
                "id": "IL-JR:6000C29b961d6c43182a64407d951542",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_64-bit",
                "id": "IL-JR:6000C29bb8fde673f515caf9bed695a1",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_minimal",
                "id": "IL-JR:6000C29c258bce8d868fa38afb946073",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_minio_minio-latest-ubuntuserver-18.04",
                "id": "IL-JR:6000C29c540ff1dbace7682100bb3282",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_dokuwiki_dokuwiki-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "IL-JR:6000C29c54ed40e5880c90ef8a6115bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_openvpn_openvpn-2.6.1-ubuntuserver-18.04",
                "id": "IL-JR:6000C29c894a1cd4f38f1db3d72cc5ea",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_basic_server",
                "id": "IL-JR:6000C29c9bfc5ab3a09ff3a80dfe46ce",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_desktop_7.4_64-bit_gnome",
                "id": "IL-JR:6000C29ce092378f6d9f2985c7ebdb49",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_32-bit",
                "id": "IL-JR:6000C29cebd37daa2ee4d7f6de19e931",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-8.0-ubuntuserver-18.04",
                "id": "IL-JR:6000C29d16b1507a7a92873aa813eb0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_wordpress-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-JR:6000C29d365974def3ea2ae16eaa5f0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_64-bit",
                "id": "IL-JR:6000C29d4049980bd16c74aa8ba91c9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpmyadmin_phpmyadmin-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "IL-JR:6000C29d6adcf6f7bbc0b10a42860eda",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-5.7-ubuntuserver-18.04",
                "id": "IL-JR:6000C29d9e2994c7ea6e03d8f470bda3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_standard_64-bit",
                "id": "IL-JR:6000C29e684efebf574b286df3b4ff4f",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-11-ubuntuserver-18.04",
                "id": "IL-JR:6000C29ea9dccc977a7cec3c16162d96",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_docker-ready-ubuntuserver-18.04",
                "id": "IL-JR:6000C29f1950d63de8fed8095fdf6e64",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-32-bit",
                "id": "IL-JR:6000C29f24bc8ec8a605b6d7bfe58835",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-dnsonly-liveinstall-centos-7.4_64-bit-minimal",
                "id": "IL-JR:6000C29f5b14b91631c7678a2dc4b8cf",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-4.0-ubuntuserver-18.04",
                "id": "IL-JR:6000C29f62a7292b19903fb7bdc4d7da",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.4-ubuntuserver-18.04",
                "id": "IL-JR:6000C29fd761c6f26056d138e165b2bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            }
        ],
        "IL-PT": [
            {
                "description": "ubuntu_server_16.04_32-bit",
                "id": "IL-PT:6000C2901a61dff371f4d1d34bd9548b",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit_optimized_updated",
                "id": "IL-PT:6000C2904fc6d8295d2b6d9687ed955e",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_zevenet_zevenet-latest-ubuntuserver-18.04",
                "id": "IL-PT:6000C2909e0736f7b76b1dc70d11567e",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_memcached_memcached-latest-ubuntuserver-18.04",
                "id": "IL-PT:6000C290a79ae490560b068973cb35f9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_minimal",
                "id": "IL-PT:6000C291195abef23f2815c6f7cc301a",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome",
                "id": "IL-PT:6000C2914d34f8fb8b449a686c6df4a5",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_freenas_11.1_64bit",
                "id": "IL-PT:6000C2916500bde8a8dba053a727a2fd",
                "sizeGB": 2,
                "usageInfo": "FreeNAS is a free and open-source network-attached storage (NAS) software based on FreeBSD and the OpenZFS file system. Provides Storage Appliance supported SMB, AFP, NFS, iSCSI, SSH, rsync and FTP\/TFTP protocols. Advanced FreeNAS features include full-disk encryption and a plug-in architecture for third-party software.\n\nConnect to FreeNAS with HTTPS Protocol:\n\nhttps:\/\/{server-ip-address]\/\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_15.04_64-bit",
                "id": "IL-PT:6000C29188a2a1c97070d1d6fb71ee89",
                "sizeGB": 5,
                "usageInfo": "In order to connect to the server with SSH, use Putty SSH Client or any other SSH Client with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nYou can find the server\'s details below.",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_basic_server",
                "id": "IL-PT:6000C291a7dbc4a539dc4500ed1975c5",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-liveinstall-centos-7.4-64-bit-minimal",
                "id": "IL-PT:6000C291ac5094ec6fe3dabe0baca794",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_basic_server",
                "id": "IL-PT:6000C2924b678625c2b07d04b4978e18",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_nginx-mysql-php7",
                "id": "IL-PT:6000C2929e92b7444e77af9b149bc9f4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-7.4-64-bit",
                "id": "IL-PT:6000C2935944aaac4c21701d3cde9610",
                "sizeGB": 15,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.2-ubuntuserver-18.04",
                "id": "IL-PT:6000C29373bf2a83a8c8610ab80234e7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_32-bit",
                "id": "IL-PT:6000C29386a7def39b3fc7e4d88eba8c",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpbb_phpbb-3.2.5-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-PT:6000C293bacc4ad2e026f66939baff71",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_standard_64-bit",
                "id": "IL-PT:6000C2947a5d7c8fead78a1ec1224fdf",
                "sizeGB": 23,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_datacenter_64-bit",
                "id": "IL-PT:6000C294fa713a5218e4d2fe9e6026c8",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_jenkins_jenkins-latest-ubuntuserver-18.04",
                "id": "IL-PT:6000C295159bc110a5482400667a7cd8",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_64-bit",
                "id": "IL-PT:6000C29541e39a9892043d7237503d06",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_desktop_8.6_64-bit_xfce4",
                "id": "IL-PT:6000C2956fdfc1fa3ffe061ba7bd46ce",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_64-bit",
                "id": "IL-PT:6000C29574cbda93387eac758727a6c9",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_32-bit",
                "id": "IL-PT:6000C295834b332b89f79521cdabca9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_datacenter_64-bit",
                "id": "IL-PT:6000C2960d7769492105a558d145c7d3",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)Username: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-10-ubuntuserver-18.04",
                "id": "IL-PT:6000C2967a1c0e996b1fadc4b42aa10f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_minimal",
                "id": "IL-PT:6000C296c816785af0416189ce873152",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_32-bit",
                "id": "IL-PT:6000C296d934a62e14bd45586beeec3f",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_minimal",
                "id": "IL-PT:6000C29786f615663312af9d49bba1ef",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_minimal",
                "id": "IL-PT:6000C2979e186bf7a61242f3bc49c945",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome_xrdp",
                "id": "IL-PT:6000C297b448da1e088f8bc4eb0be63c",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_10_desktop_64-bit",
                "id": "IL-PT:6000C2982b0030c2dbf98bcb092f92b4",
                "sizeGB": 25,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_basic_server",
                "id": "IL-PT:6000C2982cc1f899e74c4f39a9e81998",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_32bit",
                "id": "IL-PT:6000C2983bdd8b531ecfc6d892a35aa4",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_lemp-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-PT:6000C2983ff90afd6b38b5f897e32d06",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_nextcloud_nextcloud-15-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-PT:6000C2985991f64467b47d662bcb90bf",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_drupal_drupal-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-PT:6000C29863642e2615dcf655f5c2079f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.4_64-bit",
                "id": "IL-PT:6000C2988f5660c446590588b456ba80",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_datacenter_64-bit",
                "id": "IL-PT:6000C298abe9aa378af7832e3d7de7b6",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_64bit",
                "id": "IL-PT:6000C298bb2e4ea0f1891cd81735d24e",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_16.04_64-bit",
                "id": "IL-PT:6000C298bbb2d3b6e9721f4f4f3c5bf0",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_enterprise_64-bit",
                "id": "IL-PT:6000C298c677d7da830e4f3ae1765c7e",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_ubuntu64",
                "id": "IL-PT:6000C29919a41ecc0c790bf1437db1b0",
                "sizeGB": 15,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nOnce you have logged in, a simple console interface will appear and allow you to configure your site, ftp accounts, SSLs and more server configurations.\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_8.1_desktop_64-bit",
                "id": "IL-PT:6000C2999afdfe69dc442ed1dcb26fa1",
                "sizeGB": 23,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_pfsense_2.4_64bit",
                "id": "IL-PT:6000C299bd669da13cf92d780e19674d",
                "sizeGB": 2,
                "usageInfo": "Connect to the firewall using HTTPS protocol, \n\nhttps:\/\/{server-ip-address]\/\nUsername: admin\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_redis_redisserver-latest-ubuntuserver-18.04",
                "id": "IL-PT:6000C299c73cf650577c6e9781938225",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_64-bit",
                "id": "IL-PT:6000C299f04969dee8d55d2d3f0dbb96",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit",
                "id": "IL-PT:6000C29a5a7220dcf84716e7bba74215",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_dockermachinecli-0.16-ubuntuserver-18.04",
                "id": "IL-PT:6000C29a64893c54afb3950e87ba5724",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nfs_nfsserver-ubuntuserver-18.04",
                "id": "IL-PT:6000C29a770013a930d717463fcad6a1",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_standard_64-bit",
                "id": "IL-PT:6000C29a99c7cc5d67b773c85d017307",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_32-bit",
                "id": "IL-PT:6000C29a9eb2046f9d486e0297051ec8",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_tomcat_tomcat-8-ubuntuserver-18.04",
                "id": "IL-PT:6000C29ab1e22c5da5c8834442d97da7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_magento_magento-2.3-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-PT:6000C29ac6ac759b2ac9a121015cbe35",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-64-bit",
                "id": "IL-PT:6000C29ad2662cd36cbf937fd7b46fd4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_redmine_redmine-4.0-ubuntuserver-18.04-mysqlserver-5.7",
                "id": "IL-PT:6000C29b1af5c41bcfb0bfc9a8a09ff3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.6-ubuntuserver-18.04",
                "id": "IL-PT:6000C29b30e4d970258a3e02b26f884a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_joomla_joomla-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-PT:6000C29b3a176f8fbeeaef8cabc285f7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_basic_server",
                "id": "IL-PT:6000C29b6395b4cc22896d745fa1a5c4",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-csf-cmc-liveinstall-centos-7.4-64-bit-minimal",
                "id": "IL-PT:6000C29b961d6c43182a64407d951542",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_64-bit",
                "id": "IL-PT:6000C29bb8fde673f515caf9bed695a1",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_minimal",
                "id": "IL-PT:6000C29c258bce8d868fa38afb946073",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_minio_minio-latest-ubuntuserver-18.04",
                "id": "IL-PT:6000C29c540ff1dbace7682100bb3282",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_dokuwiki_dokuwiki-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "IL-PT:6000C29c54ed40e5880c90ef8a6115bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_openvpn_openvpn-2.6.1-ubuntuserver-18.04",
                "id": "IL-PT:6000C29c894a1cd4f38f1db3d72cc5ea",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_basic_server",
                "id": "IL-PT:6000C29c9bfc5ab3a09ff3a80dfe46ce",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_desktop_7.4_64-bit_gnome",
                "id": "IL-PT:6000C29ce092378f6d9f2985c7ebdb49",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_32-bit",
                "id": "IL-PT:6000C29cebd37daa2ee4d7f6de19e931",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-8.0-ubuntuserver-18.04",
                "id": "IL-PT:6000C29d16b1507a7a92873aa813eb0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_wordpress-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-PT:6000C29d365974def3ea2ae16eaa5f0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_64-bit",
                "id": "IL-PT:6000C29d4049980bd16c74aa8ba91c9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpmyadmin_phpmyadmin-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "IL-PT:6000C29d6adcf6f7bbc0b10a42860eda",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-5.7-ubuntuserver-18.04",
                "id": "IL-PT:6000C29d9e2994c7ea6e03d8f470bda3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_standard_64-bit",
                "id": "IL-PT:6000C29e684efebf574b286df3b4ff4f",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-11-ubuntuserver-18.04",
                "id": "IL-PT:6000C29ea9dccc977a7cec3c16162d96",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_docker-ready-ubuntuserver-18.04",
                "id": "IL-PT:6000C29f1950d63de8fed8095fdf6e64",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-32-bit",
                "id": "IL-PT:6000C29f24bc8ec8a605b6d7bfe58835",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-dnsonly-liveinstall-centos-7.4_64-bit-minimal",
                "id": "IL-PT:6000C29f5b14b91631c7678a2dc4b8cf",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-4.0-ubuntuserver-18.04",
                "id": "IL-PT:6000C29f62a7292b19903fb7bdc4d7da",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.4-ubuntuserver-18.04",
                "id": "IL-PT:6000C29fd761c6f26056d138e165b2bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            }
        ],
        "IL-RH": [
            {
                "description": "ubuntu_server_16.04_32-bit",
                "id": "IL-RH:6000C2901a61dff371f4d1d34bd9548b",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit_optimized_updated",
                "id": "IL-RH:6000C2904fc6d8295d2b6d9687ed955e",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_zevenet_zevenet-latest-ubuntuserver-18.04",
                "id": "IL-RH:6000C2909e0736f7b76b1dc70d11567e",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_memcached_memcached-latest-ubuntuserver-18.04",
                "id": "IL-RH:6000C290a79ae490560b068973cb35f9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_minimal",
                "id": "IL-RH:6000C291195abef23f2815c6f7cc301a",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome",
                "id": "IL-RH:6000C2914d34f8fb8b449a686c6df4a5",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_freenas_11.1_64bit",
                "id": "IL-RH:6000C2916500bde8a8dba053a727a2fd",
                "sizeGB": 2,
                "usageInfo": "FreeNAS is a free and open-source network-attached storage (NAS) software based on FreeBSD and the OpenZFS file system. Provides Storage Appliance supported SMB, AFP, NFS, iSCSI, SSH, rsync and FTP\/TFTP protocols. Advanced FreeNAS features include full-disk encryption and a plug-in architecture for third-party software.\n\nConnect to FreeNAS with HTTPS Protocol:\n\nhttps:\/\/{server-ip-address]\/\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_15.04_64-bit",
                "id": "IL-RH:6000C29188a2a1c97070d1d6fb71ee89",
                "sizeGB": 5,
                "usageInfo": "In order to connect to the server with SSH, use Putty SSH Client or any other SSH Client with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nYou can find the server\'s details below.",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_basic_server",
                "id": "IL-RH:6000C291a7dbc4a539dc4500ed1975c5",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-liveinstall-centos-7.4-64-bit-minimal",
                "id": "IL-RH:6000C291ac5094ec6fe3dabe0baca794",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_basic_server",
                "id": "IL-RH:6000C2924b678625c2b07d04b4978e18",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_nginx-mysql-php7",
                "id": "IL-RH:6000C2929e92b7444e77af9b149bc9f4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-7.4-64-bit",
                "id": "IL-RH:6000C2935944aaac4c21701d3cde9610",
                "sizeGB": 15,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.2-ubuntuserver-18.04",
                "id": "IL-RH:6000C29373bf2a83a8c8610ab80234e7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_32-bit",
                "id": "IL-RH:6000C29386a7def39b3fc7e4d88eba8c",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpbb_phpbb-3.2.5-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-RH:6000C293bacc4ad2e026f66939baff71",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_standard_64-bit",
                "id": "IL-RH:6000C2947a5d7c8fead78a1ec1224fdf",
                "sizeGB": 23,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_datacenter_64-bit",
                "id": "IL-RH:6000C294fa713a5218e4d2fe9e6026c8",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_jenkins_jenkins-latest-ubuntuserver-18.04",
                "id": "IL-RH:6000C295159bc110a5482400667a7cd8",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_64-bit",
                "id": "IL-RH:6000C29541e39a9892043d7237503d06",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_desktop_8.6_64-bit_xfce4",
                "id": "IL-RH:6000C2956fdfc1fa3ffe061ba7bd46ce",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_64-bit",
                "id": "IL-RH:6000C29574cbda93387eac758727a6c9",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_32-bit",
                "id": "IL-RH:6000C295834b332b89f79521cdabca9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_datacenter_64-bit",
                "id": "IL-RH:6000C2960d7769492105a558d145c7d3",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)Username: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-10-ubuntuserver-18.04",
                "id": "IL-RH:6000C2967a1c0e996b1fadc4b42aa10f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_minimal",
                "id": "IL-RH:6000C296c816785af0416189ce873152",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_32-bit",
                "id": "IL-RH:6000C296d934a62e14bd45586beeec3f",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_minimal",
                "id": "IL-RH:6000C29786f615663312af9d49bba1ef",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_minimal",
                "id": "IL-RH:6000C2979e186bf7a61242f3bc49c945",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome_xrdp",
                "id": "IL-RH:6000C297b448da1e088f8bc4eb0be63c",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_10_desktop_64-bit",
                "id": "IL-RH:6000C2982b0030c2dbf98bcb092f92b4",
                "sizeGB": 25,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_basic_server",
                "id": "IL-RH:6000C2982cc1f899e74c4f39a9e81998",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_32bit",
                "id": "IL-RH:6000C2983bdd8b531ecfc6d892a35aa4",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_lemp-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-RH:6000C2983ff90afd6b38b5f897e32d06",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_nextcloud_nextcloud-15-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-RH:6000C2985991f64467b47d662bcb90bf",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_drupal_drupal-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-RH:6000C29863642e2615dcf655f5c2079f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.4_64-bit",
                "id": "IL-RH:6000C2988f5660c446590588b456ba80",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_datacenter_64-bit",
                "id": "IL-RH:6000C298abe9aa378af7832e3d7de7b6",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_64bit",
                "id": "IL-RH:6000C298bb2e4ea0f1891cd81735d24e",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_16.04_64-bit",
                "id": "IL-RH:6000C298bbb2d3b6e9721f4f4f3c5bf0",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_enterprise_64-bit",
                "id": "IL-RH:6000C298c677d7da830e4f3ae1765c7e",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_ubuntu64",
                "id": "IL-RH:6000C29919a41ecc0c790bf1437db1b0",
                "sizeGB": 15,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nOnce you have logged in, a simple console interface will appear and allow you to configure your site, ftp accounts, SSLs and more server configurations.\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_8.1_desktop_64-bit",
                "id": "IL-RH:6000C2999afdfe69dc442ed1dcb26fa1",
                "sizeGB": 23,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_pfsense_2.4_64bit",
                "id": "IL-RH:6000C299bd669da13cf92d780e19674d",
                "sizeGB": 2,
                "usageInfo": "Connect to the firewall using HTTPS protocol, \n\nhttps:\/\/{server-ip-address]\/\nUsername: admin\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_redis_redisserver-latest-ubuntuserver-18.04",
                "id": "IL-RH:6000C299c73cf650577c6e9781938225",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_64-bit",
                "id": "IL-RH:6000C299f04969dee8d55d2d3f0dbb96",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit",
                "id": "IL-RH:6000C29a5a7220dcf84716e7bba74215",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_dockermachinecli-0.16-ubuntuserver-18.04",
                "id": "IL-RH:6000C29a64893c54afb3950e87ba5724",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nfs_nfsserver-ubuntuserver-18.04",
                "id": "IL-RH:6000C29a770013a930d717463fcad6a1",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_standard_64-bit",
                "id": "IL-RH:6000C29a99c7cc5d67b773c85d017307",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_32-bit",
                "id": "IL-RH:6000C29a9eb2046f9d486e0297051ec8",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_tomcat_tomcat-8-ubuntuserver-18.04",
                "id": "IL-RH:6000C29ab1e22c5da5c8834442d97da7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_magento_magento-2.3-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-RH:6000C29ac6ac759b2ac9a121015cbe35",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-64-bit",
                "id": "IL-RH:6000C29ad2662cd36cbf937fd7b46fd4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_redmine_redmine-4.0-ubuntuserver-18.04-mysqlserver-5.7",
                "id": "IL-RH:6000C29b1af5c41bcfb0bfc9a8a09ff3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.6-ubuntuserver-18.04",
                "id": "IL-RH:6000C29b30e4d970258a3e02b26f884a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_joomla_joomla-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-RH:6000C29b3a176f8fbeeaef8cabc285f7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_basic_server",
                "id": "IL-RH:6000C29b6395b4cc22896d745fa1a5c4",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-csf-cmc-liveinstall-centos-7.4-64-bit-minimal",
                "id": "IL-RH:6000C29b961d6c43182a64407d951542",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_64-bit",
                "id": "IL-RH:6000C29bb8fde673f515caf9bed695a1",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_minimal",
                "id": "IL-RH:6000C29c258bce8d868fa38afb946073",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_minio_minio-latest-ubuntuserver-18.04",
                "id": "IL-RH:6000C29c540ff1dbace7682100bb3282",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_dokuwiki_dokuwiki-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "IL-RH:6000C29c54ed40e5880c90ef8a6115bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_openvpn_openvpn-2.6.1-ubuntuserver-18.04",
                "id": "IL-RH:6000C29c894a1cd4f38f1db3d72cc5ea",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_basic_server",
                "id": "IL-RH:6000C29c9bfc5ab3a09ff3a80dfe46ce",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_desktop_7.4_64-bit_gnome",
                "id": "IL-RH:6000C29ce092378f6d9f2985c7ebdb49",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_32-bit",
                "id": "IL-RH:6000C29cebd37daa2ee4d7f6de19e931",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-8.0-ubuntuserver-18.04",
                "id": "IL-RH:6000C29d16b1507a7a92873aa813eb0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_wordpress-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-RH:6000C29d365974def3ea2ae16eaa5f0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_64-bit",
                "id": "IL-RH:6000C29d4049980bd16c74aa8ba91c9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpmyadmin_phpmyadmin-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "IL-RH:6000C29d6adcf6f7bbc0b10a42860eda",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-5.7-ubuntuserver-18.04",
                "id": "IL-RH:6000C29d9e2994c7ea6e03d8f470bda3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_standard_64-bit",
                "id": "IL-RH:6000C29e684efebf574b286df3b4ff4f",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-11-ubuntuserver-18.04",
                "id": "IL-RH:6000C29ea9dccc977a7cec3c16162d96",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_docker-ready-ubuntuserver-18.04",
                "id": "IL-RH:6000C29f1950d63de8fed8095fdf6e64",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-32-bit",
                "id": "IL-RH:6000C29f24bc8ec8a605b6d7bfe58835",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-dnsonly-liveinstall-centos-7.4_64-bit-minimal",
                "id": "IL-RH:6000C29f5b14b91631c7678a2dc4b8cf",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-4.0-ubuntuserver-18.04",
                "id": "IL-RH:6000C29f62a7292b19903fb7bdc4d7da",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.4-ubuntuserver-18.04",
                "id": "IL-RH:6000C29fd761c6f26056d138e165b2bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            }
        ],
        "IL-TA": [
            {
                "description": "ubuntu_server_16.04_32-bit",
                "id": "IL-TA:6000C2901a61dff371f4d1d34bd9548b",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit_optimized_updated",
                "id": "IL-TA:6000C2904fc6d8295d2b6d9687ed955e",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_zevenet_zevenet-latest-ubuntuserver-18.04",
                "id": "IL-TA:6000C2909e0736f7b76b1dc70d11567e",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_memcached_memcached-latest-ubuntuserver-18.04",
                "id": "IL-TA:6000C290a79ae490560b068973cb35f9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_minimal",
                "id": "IL-TA:6000C291195abef23f2815c6f7cc301a",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome",
                "id": "IL-TA:6000C2914d34f8fb8b449a686c6df4a5",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_freenas_11.1_64bit",
                "id": "IL-TA:6000C2916500bde8a8dba053a727a2fd",
                "sizeGB": 2,
                "usageInfo": "FreeNAS is a free and open-source network-attached storage (NAS) software based on FreeBSD and the OpenZFS file system. Provides Storage Appliance supported SMB, AFP, NFS, iSCSI, SSH, rsync and FTP\/TFTP protocols. Advanced FreeNAS features include full-disk encryption and a plug-in architecture for third-party software.\n\nConnect to FreeNAS with HTTPS Protocol:\n\nhttps:\/\/{server-ip-address]\/\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_15.04_64-bit",
                "id": "IL-TA:6000C29188a2a1c97070d1d6fb71ee89",
                "sizeGB": 5,
                "usageInfo": "In order to connect to the server with SSH, use Putty SSH Client or any other SSH Client with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nYou can find the server\'s details below.",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_basic_server",
                "id": "IL-TA:6000C291a7dbc4a539dc4500ed1975c5",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-liveinstall-centos-7.4-64-bit-minimal",
                "id": "IL-TA:6000C291ac5094ec6fe3dabe0baca794",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_basic_server",
                "id": "IL-TA:6000C2924b678625c2b07d04b4978e18",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_nginx-mysql-php7",
                "id": "IL-TA:6000C2929e92b7444e77af9b149bc9f4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-7.4-64-bit",
                "id": "IL-TA:6000C2935944aaac4c21701d3cde9610",
                "sizeGB": 15,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.2-ubuntuserver-18.04",
                "id": "IL-TA:6000C29373bf2a83a8c8610ab80234e7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_32-bit",
                "id": "IL-TA:6000C29386a7def39b3fc7e4d88eba8c",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpbb_phpbb-3.2.5-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-TA:6000C293bacc4ad2e026f66939baff71",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_standard_64-bit",
                "id": "IL-TA:6000C2947a5d7c8fead78a1ec1224fdf",
                "sizeGB": 23,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_datacenter_64-bit",
                "id": "IL-TA:6000C294fa713a5218e4d2fe9e6026c8",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_jenkins_jenkins-latest-ubuntuserver-18.04",
                "id": "IL-TA:6000C295159bc110a5482400667a7cd8",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_64-bit",
                "id": "IL-TA:6000C29541e39a9892043d7237503d06",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_desktop_8.6_64-bit_xfce4",
                "id": "IL-TA:6000C2956fdfc1fa3ffe061ba7bd46ce",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_64-bit",
                "id": "IL-TA:6000C29574cbda93387eac758727a6c9",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_32-bit",
                "id": "IL-TA:6000C295834b332b89f79521cdabca9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_datacenter_64-bit",
                "id": "IL-TA:6000C2960d7769492105a558d145c7d3",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)Username: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-10-ubuntuserver-18.04",
                "id": "IL-TA:6000C2967a1c0e996b1fadc4b42aa10f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_minimal",
                "id": "IL-TA:6000C296c816785af0416189ce873152",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_32-bit",
                "id": "IL-TA:6000C296d934a62e14bd45586beeec3f",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_minimal",
                "id": "IL-TA:6000C29786f615663312af9d49bba1ef",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_minimal",
                "id": "IL-TA:6000C2979e186bf7a61242f3bc49c945",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome_xrdp",
                "id": "IL-TA:6000C297b448da1e088f8bc4eb0be63c",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_10_desktop_64-bit",
                "id": "IL-TA:6000C2982b0030c2dbf98bcb092f92b4",
                "sizeGB": 25,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_basic_server",
                "id": "IL-TA:6000C2982cc1f899e74c4f39a9e81998",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_32bit",
                "id": "IL-TA:6000C2983bdd8b531ecfc6d892a35aa4",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_lemp-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-TA:6000C2983ff90afd6b38b5f897e32d06",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_nextcloud_nextcloud-15-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-TA:6000C2985991f64467b47d662bcb90bf",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_drupal_drupal-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-TA:6000C29863642e2615dcf655f5c2079f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.4_64-bit",
                "id": "IL-TA:6000C2988f5660c446590588b456ba80",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_datacenter_64-bit",
                "id": "IL-TA:6000C298abe9aa378af7832e3d7de7b6",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_64bit",
                "id": "IL-TA:6000C298bb2e4ea0f1891cd81735d24e",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_16.04_64-bit",
                "id": "IL-TA:6000C298bbb2d3b6e9721f4f4f3c5bf0",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_enterprise_64-bit",
                "id": "IL-TA:6000C298c677d7da830e4f3ae1765c7e",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_ubuntu64",
                "id": "IL-TA:6000C29919a41ecc0c790bf1437db1b0",
                "sizeGB": 15,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nOnce you have logged in, a simple console interface will appear and allow you to configure your site, ftp accounts, SSLs and more server configurations.\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_8.1_desktop_64-bit",
                "id": "IL-TA:6000C2999afdfe69dc442ed1dcb26fa1",
                "sizeGB": 23,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_pfsense_2.4_64bit",
                "id": "IL-TA:6000C299bd669da13cf92d780e19674d",
                "sizeGB": 2,
                "usageInfo": "Connect to the firewall using HTTPS protocol, \n\nhttps:\/\/{server-ip-address]\/\nUsername: admin\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_redis_redisserver-latest-ubuntuserver-18.04",
                "id": "IL-TA:6000C299c73cf650577c6e9781938225",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_64-bit",
                "id": "IL-TA:6000C299f04969dee8d55d2d3f0dbb96",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit",
                "id": "IL-TA:6000C29a5a7220dcf84716e7bba74215",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_dockermachinecli-0.16-ubuntuserver-18.04",
                "id": "IL-TA:6000C29a64893c54afb3950e87ba5724",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nfs_nfsserver-ubuntuserver-18.04",
                "id": "IL-TA:6000C29a770013a930d717463fcad6a1",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_standard_64-bit",
                "id": "IL-TA:6000C29a99c7cc5d67b773c85d017307",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_32-bit",
                "id": "IL-TA:6000C29a9eb2046f9d486e0297051ec8",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_tomcat_tomcat-8-ubuntuserver-18.04",
                "id": "IL-TA:6000C29ab1e22c5da5c8834442d97da7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_magento_magento-2.3-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-TA:6000C29ac6ac759b2ac9a121015cbe35",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-64-bit",
                "id": "IL-TA:6000C29ad2662cd36cbf937fd7b46fd4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_redmine_redmine-4.0-ubuntuserver-18.04-mysqlserver-5.7",
                "id": "IL-TA:6000C29b1af5c41bcfb0bfc9a8a09ff3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.6-ubuntuserver-18.04",
                "id": "IL-TA:6000C29b30e4d970258a3e02b26f884a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_joomla_joomla-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-TA:6000C29b3a176f8fbeeaef8cabc285f7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_basic_server",
                "id": "IL-TA:6000C29b6395b4cc22896d745fa1a5c4",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-csf-cmc-liveinstall-centos-7.4-64-bit-minimal",
                "id": "IL-TA:6000C29b961d6c43182a64407d951542",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_64-bit",
                "id": "IL-TA:6000C29bb8fde673f515caf9bed695a1",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_minimal",
                "id": "IL-TA:6000C29c258bce8d868fa38afb946073",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_minio_minio-latest-ubuntuserver-18.04",
                "id": "IL-TA:6000C29c540ff1dbace7682100bb3282",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_dokuwiki_dokuwiki-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "IL-TA:6000C29c54ed40e5880c90ef8a6115bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_openvpn_openvpn-2.6.1-ubuntuserver-18.04",
                "id": "IL-TA:6000C29c894a1cd4f38f1db3d72cc5ea",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_basic_server",
                "id": "IL-TA:6000C29c9bfc5ab3a09ff3a80dfe46ce",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_desktop_7.4_64-bit_gnome",
                "id": "IL-TA:6000C29ce092378f6d9f2985c7ebdb49",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_32-bit",
                "id": "IL-TA:6000C29cebd37daa2ee4d7f6de19e931",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-8.0-ubuntuserver-18.04",
                "id": "IL-TA:6000C29d16b1507a7a92873aa813eb0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_wordpress-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "IL-TA:6000C29d365974def3ea2ae16eaa5f0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_64-bit",
                "id": "IL-TA:6000C29d4049980bd16c74aa8ba91c9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpmyadmin_phpmyadmin-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "IL-TA:6000C29d6adcf6f7bbc0b10a42860eda",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-5.7-ubuntuserver-18.04",
                "id": "IL-TA:6000C29d9e2994c7ea6e03d8f470bda3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_standard_64-bit",
                "id": "IL-TA:6000C29e684efebf574b286df3b4ff4f",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-11-ubuntuserver-18.04",
                "id": "IL-TA:6000C29ea9dccc977a7cec3c16162d96",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_docker-ready-ubuntuserver-18.04",
                "id": "IL-TA:6000C29f1950d63de8fed8095fdf6e64",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-32-bit",
                "id": "IL-TA:6000C29f24bc8ec8a605b6d7bfe58835",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-dnsonly-liveinstall-centos-7.4_64-bit-minimal",
                "id": "IL-TA:6000C29f5b14b91631c7678a2dc4b8cf",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-4.0-ubuntuserver-18.04",
                "id": "IL-TA:6000C29f62a7292b19903fb7bdc4d7da",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.4-ubuntuserver-18.04",
                "id": "IL-TA:6000C29fd761c6f26056d138e165b2bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            }
        ],
        "US-NY2": [
            {
                "description": "ubuntu_server_16.04_32-bit",
                "id": "US-NY2:6000C2901a61dff371f4d1d34bd9548b",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit_optimized_updated",
                "id": "US-NY2:6000C2904fc6d8295d2b6d9687ed955e",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_zevenet_zevenet-latest-ubuntuserver-18.04",
                "id": "US-NY2:6000C2909e0736f7b76b1dc70d11567e",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_memcached_memcached-latest-ubuntuserver-18.04",
                "id": "US-NY2:6000C290a79ae490560b068973cb35f9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_minimal",
                "id": "US-NY2:6000C291195abef23f2815c6f7cc301a",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome",
                "id": "US-NY2:6000C2914d34f8fb8b449a686c6df4a5",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_freenas_11.1_64bit",
                "id": "US-NY2:6000C2916500bde8a8dba053a727a2fd",
                "sizeGB": 2,
                "usageInfo": "FreeNAS is a free and open-source network-attached storage (NAS) software based on FreeBSD and the OpenZFS file system. Provides Storage Appliance supported SMB, AFP, NFS, iSCSI, SSH, rsync and FTP\/TFTP protocols. Advanced FreeNAS features include full-disk encryption and a plug-in architecture for third-party software.\n\nConnect to FreeNAS with HTTPS Protocol:\n\nhttps:\/\/{server-ip-address]\/\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_15.04_64-bit",
                "id": "US-NY2:6000C29188a2a1c97070d1d6fb71ee89",
                "sizeGB": 5,
                "usageInfo": "In order to connect to the server with SSH, use Putty SSH Client or any other SSH Client with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nYou can find the server\'s details below.",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_basic_server",
                "id": "US-NY2:6000C291a7dbc4a539dc4500ed1975c5",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-liveinstall-centos-7.4-64-bit-minimal",
                "id": "US-NY2:6000C291ac5094ec6fe3dabe0baca794",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_basic_server",
                "id": "US-NY2:6000C2924b678625c2b07d04b4978e18",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_nginx-mysql-php7",
                "id": "US-NY2:6000C2929e92b7444e77af9b149bc9f4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-7.4-64-bit",
                "id": "US-NY2:6000C2935944aaac4c21701d3cde9610",
                "sizeGB": 15,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.2-ubuntuserver-18.04",
                "id": "US-NY2:6000C29373bf2a83a8c8610ab80234e7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_32-bit",
                "id": "US-NY2:6000C29386a7def39b3fc7e4d88eba8c",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpbb_phpbb-3.2.5-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-NY2:6000C293bacc4ad2e026f66939baff71",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_standard_64-bit",
                "id": "US-NY2:6000C2947a5d7c8fead78a1ec1224fdf",
                "sizeGB": 23,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_datacenter_64-bit",
                "id": "US-NY2:6000C294fa713a5218e4d2fe9e6026c8",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_jenkins_jenkins-latest-ubuntuserver-18.04",
                "id": "US-NY2:6000C295159bc110a5482400667a7cd8",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_64-bit",
                "id": "US-NY2:6000C29541e39a9892043d7237503d06",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_desktop_8.6_64-bit_xfce4",
                "id": "US-NY2:6000C2956fdfc1fa3ffe061ba7bd46ce",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_64-bit",
                "id": "US-NY2:6000C29574cbda93387eac758727a6c9",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_32-bit",
                "id": "US-NY2:6000C295834b332b89f79521cdabca9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_datacenter_64-bit",
                "id": "US-NY2:6000C2960d7769492105a558d145c7d3",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)Username: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-10-ubuntuserver-18.04",
                "id": "US-NY2:6000C2967a1c0e996b1fadc4b42aa10f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_minimal",
                "id": "US-NY2:6000C296c816785af0416189ce873152",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_32-bit",
                "id": "US-NY2:6000C296d934a62e14bd45586beeec3f",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_minimal",
                "id": "US-NY2:6000C29786f615663312af9d49bba1ef",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_minimal",
                "id": "US-NY2:6000C2979e186bf7a61242f3bc49c945",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome_xrdp",
                "id": "US-NY2:6000C297b448da1e088f8bc4eb0be63c",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_10_desktop_64-bit",
                "id": "US-NY2:6000C2982b0030c2dbf98bcb092f92b4",
                "sizeGB": 25,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_basic_server",
                "id": "US-NY2:6000C2982cc1f899e74c4f39a9e81998",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_32bit",
                "id": "US-NY2:6000C2983bdd8b531ecfc6d892a35aa4",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_lemp-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-NY2:6000C2983ff90afd6b38b5f897e32d06",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_nextcloud_nextcloud-15-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-NY2:6000C2985991f64467b47d662bcb90bf",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_drupal_drupal-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-NY2:6000C29863642e2615dcf655f5c2079f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.4_64-bit",
                "id": "US-NY2:6000C2988f5660c446590588b456ba80",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_datacenter_64-bit",
                "id": "US-NY2:6000C298abe9aa378af7832e3d7de7b6",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_64bit",
                "id": "US-NY2:6000C298bb2e4ea0f1891cd81735d24e",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_16.04_64-bit",
                "id": "US-NY2:6000C298bbb2d3b6e9721f4f4f3c5bf0",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_enterprise_64-bit",
                "id": "US-NY2:6000C298c677d7da830e4f3ae1765c7e",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_ubuntu64",
                "id": "US-NY2:6000C29919a41ecc0c790bf1437db1b0",
                "sizeGB": 15,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nOnce you have logged in, a simple console interface will appear and allow you to configure your site, ftp accounts, SSLs and more server configurations.\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_8.1_desktop_64-bit",
                "id": "US-NY2:6000C2999afdfe69dc442ed1dcb26fa1",
                "sizeGB": 23,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_pfsense_2.4_64bit",
                "id": "US-NY2:6000C299bd669da13cf92d780e19674d",
                "sizeGB": 2,
                "usageInfo": "Connect to the firewall using HTTPS protocol, \n\nhttps:\/\/{server-ip-address]\/\nUsername: admin\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_redis_redisserver-latest-ubuntuserver-18.04",
                "id": "US-NY2:6000C299c73cf650577c6e9781938225",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_64-bit",
                "id": "US-NY2:6000C299f04969dee8d55d2d3f0dbb96",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit",
                "id": "US-NY2:6000C29a5a7220dcf84716e7bba74215",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_dockermachinecli-0.16-ubuntuserver-18.04",
                "id": "US-NY2:6000C29a64893c54afb3950e87ba5724",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nfs_nfsserver-ubuntuserver-18.04",
                "id": "US-NY2:6000C29a770013a930d717463fcad6a1",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_standard_64-bit",
                "id": "US-NY2:6000C29a99c7cc5d67b773c85d017307",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_32-bit",
                "id": "US-NY2:6000C29a9eb2046f9d486e0297051ec8",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_tomcat_tomcat-8-ubuntuserver-18.04",
                "id": "US-NY2:6000C29ab1e22c5da5c8834442d97da7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_magento_magento-2.3-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-NY2:6000C29ac6ac759b2ac9a121015cbe35",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-64-bit",
                "id": "US-NY2:6000C29ad2662cd36cbf937fd7b46fd4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_redmine_redmine-4.0-ubuntuserver-18.04-mysqlserver-5.7",
                "id": "US-NY2:6000C29b1af5c41bcfb0bfc9a8a09ff3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.6-ubuntuserver-18.04",
                "id": "US-NY2:6000C29b30e4d970258a3e02b26f884a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_joomla_joomla-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-NY2:6000C29b3a176f8fbeeaef8cabc285f7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_basic_server",
                "id": "US-NY2:6000C29b6395b4cc22896d745fa1a5c4",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-csf-cmc-liveinstall-centos-7.4-64-bit-minimal",
                "id": "US-NY2:6000C29b961d6c43182a64407d951542",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_64-bit",
                "id": "US-NY2:6000C29bb8fde673f515caf9bed695a1",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_minimal",
                "id": "US-NY2:6000C29c258bce8d868fa38afb946073",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_minio_minio-latest-ubuntuserver-18.04",
                "id": "US-NY2:6000C29c540ff1dbace7682100bb3282",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_dokuwiki_dokuwiki-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "US-NY2:6000C29c54ed40e5880c90ef8a6115bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_openvpn_openvpn-2.6.1-ubuntuserver-18.04",
                "id": "US-NY2:6000C29c894a1cd4f38f1db3d72cc5ea",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_basic_server",
                "id": "US-NY2:6000C29c9bfc5ab3a09ff3a80dfe46ce",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_desktop_7.4_64-bit_gnome",
                "id": "US-NY2:6000C29ce092378f6d9f2985c7ebdb49",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_32-bit",
                "id": "US-NY2:6000C29cebd37daa2ee4d7f6de19e931",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-8.0-ubuntuserver-18.04",
                "id": "US-NY2:6000C29d16b1507a7a92873aa813eb0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_wordpress-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-NY2:6000C29d365974def3ea2ae16eaa5f0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_64-bit",
                "id": "US-NY2:6000C29d4049980bd16c74aa8ba91c9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpmyadmin_phpmyadmin-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "US-NY2:6000C29d6adcf6f7bbc0b10a42860eda",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-5.7-ubuntuserver-18.04",
                "id": "US-NY2:6000C29d9e2994c7ea6e03d8f470bda3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_standard_64-bit",
                "id": "US-NY2:6000C29e684efebf574b286df3b4ff4f",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-11-ubuntuserver-18.04",
                "id": "US-NY2:6000C29ea9dccc977a7cec3c16162d96",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_docker-ready-ubuntuserver-18.04",
                "id": "US-NY2:6000C29f1950d63de8fed8095fdf6e64",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-32-bit",
                "id": "US-NY2:6000C29f24bc8ec8a605b6d7bfe58835",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-dnsonly-liveinstall-centos-7.4_64-bit-minimal",
                "id": "US-NY2:6000C29f5b14b91631c7678a2dc4b8cf",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-4.0-ubuntuserver-18.04",
                "id": "US-NY2:6000C29f62a7292b19903fb7bdc4d7da",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.4-ubuntuserver-18.04",
                "id": "US-NY2:6000C29fd761c6f26056d138e165b2bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            }
        ],
        "US-SC": [
            {
                "description": "ubuntu_server_16.04_32-bit",
                "id": "US-SC:6000C2901a61dff371f4d1d34bd9548b",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit_optimized_updated",
                "id": "US-SC:6000C2904fc6d8295d2b6d9687ed955e",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_zevenet_zevenet-latest-ubuntuserver-18.04",
                "id": "US-SC:6000C2909e0736f7b76b1dc70d11567e",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_memcached_memcached-latest-ubuntuserver-18.04",
                "id": "US-SC:6000C290a79ae490560b068973cb35f9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_minimal",
                "id": "US-SC:6000C291195abef23f2815c6f7cc301a",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome",
                "id": "US-SC:6000C2914d34f8fb8b449a686c6df4a5",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_freenas_11.1_64bit",
                "id": "US-SC:6000C2916500bde8a8dba053a727a2fd",
                "sizeGB": 2,
                "usageInfo": "FreeNAS is a free and open-source network-attached storage (NAS) software based on FreeBSD and the OpenZFS file system. Provides Storage Appliance supported SMB, AFP, NFS, iSCSI, SSH, rsync and FTP\/TFTP protocols. Advanced FreeNAS features include full-disk encryption and a plug-in architecture for third-party software.\n\nConnect to FreeNAS with HTTPS Protocol:\n\nhttps:\/\/{server-ip-address]\/\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_15.04_64-bit",
                "id": "US-SC:6000C29188a2a1c97070d1d6fb71ee89",
                "sizeGB": 5,
                "usageInfo": "In order to connect to the server with SSH, use Putty SSH Client or any other SSH Client with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nYou can find the server\'s details below.",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_basic_server",
                "id": "US-SC:6000C291a7dbc4a539dc4500ed1975c5",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-liveinstall-centos-7.4-64-bit-minimal",
                "id": "US-SC:6000C291ac5094ec6fe3dabe0baca794",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_basic_server",
                "id": "US-SC:6000C2924b678625c2b07d04b4978e18",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_nginx-mysql-php7",
                "id": "US-SC:6000C2929e92b7444e77af9b149bc9f4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-7.4-64-bit",
                "id": "US-SC:6000C2935944aaac4c21701d3cde9610",
                "sizeGB": 15,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.2-ubuntuserver-18.04",
                "id": "US-SC:6000C29373bf2a83a8c8610ab80234e7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_32-bit",
                "id": "US-SC:6000C29386a7def39b3fc7e4d88eba8c",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpbb_phpbb-3.2.5-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-SC:6000C293bacc4ad2e026f66939baff71",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_standard_64-bit",
                "id": "US-SC:6000C2947a5d7c8fead78a1ec1224fdf",
                "sizeGB": 23,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_datacenter_64-bit",
                "id": "US-SC:6000C294fa713a5218e4d2fe9e6026c8",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_jenkins_jenkins-latest-ubuntuserver-18.04",
                "id": "US-SC:6000C295159bc110a5482400667a7cd8",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_64-bit",
                "id": "US-SC:6000C29541e39a9892043d7237503d06",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_desktop_8.6_64-bit_xfce4",
                "id": "US-SC:6000C2956fdfc1fa3ffe061ba7bd46ce",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_64-bit",
                "id": "US-SC:6000C29574cbda93387eac758727a6c9",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_32-bit",
                "id": "US-SC:6000C295834b332b89f79521cdabca9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_datacenter_64-bit",
                "id": "US-SC:6000C2960d7769492105a558d145c7d3",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)Username: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-10-ubuntuserver-18.04",
                "id": "US-SC:6000C2967a1c0e996b1fadc4b42aa10f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_minimal",
                "id": "US-SC:6000C296c816785af0416189ce873152",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_32-bit",
                "id": "US-SC:6000C296d934a62e14bd45586beeec3f",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_minimal",
                "id": "US-SC:6000C29786f615663312af9d49bba1ef",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_minimal",
                "id": "US-SC:6000C2979e186bf7a61242f3bc49c945",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome_xrdp",
                "id": "US-SC:6000C297b448da1e088f8bc4eb0be63c",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_10_desktop_64-bit",
                "id": "US-SC:6000C2982b0030c2dbf98bcb092f92b4",
                "sizeGB": 25,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_basic_server",
                "id": "US-SC:6000C2982cc1f899e74c4f39a9e81998",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_32bit",
                "id": "US-SC:6000C2983bdd8b531ecfc6d892a35aa4",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_lemp-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-SC:6000C2983ff90afd6b38b5f897e32d06",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_nextcloud_nextcloud-15-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-SC:6000C2985991f64467b47d662bcb90bf",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_drupal_drupal-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-SC:6000C29863642e2615dcf655f5c2079f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.4_64-bit",
                "id": "US-SC:6000C2988f5660c446590588b456ba80",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_datacenter_64-bit",
                "id": "US-SC:6000C298abe9aa378af7832e3d7de7b6",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_64bit",
                "id": "US-SC:6000C298bb2e4ea0f1891cd81735d24e",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_16.04_64-bit",
                "id": "US-SC:6000C298bbb2d3b6e9721f4f4f3c5bf0",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_enterprise_64-bit",
                "id": "US-SC:6000C298c677d7da830e4f3ae1765c7e",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_ubuntu64",
                "id": "US-SC:6000C29919a41ecc0c790bf1437db1b0",
                "sizeGB": 15,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nOnce you have logged in, a simple console interface will appear and allow you to configure your site, ftp accounts, SSLs and more server configurations.\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_8.1_desktop_64-bit",
                "id": "US-SC:6000C2999afdfe69dc442ed1dcb26fa1",
                "sizeGB": 23,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_pfsense_2.4_64bit",
                "id": "US-SC:6000C299bd669da13cf92d780e19674d",
                "sizeGB": 2,
                "usageInfo": "Connect to the firewall using HTTPS protocol, \n\nhttps:\/\/{server-ip-address]\/\nUsername: admin\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_redis_redisserver-latest-ubuntuserver-18.04",
                "id": "US-SC:6000C299c73cf650577c6e9781938225",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_64-bit",
                "id": "US-SC:6000C299f04969dee8d55d2d3f0dbb96",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit",
                "id": "US-SC:6000C29a5a7220dcf84716e7bba74215",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_dockermachinecli-0.16-ubuntuserver-18.04",
                "id": "US-SC:6000C29a64893c54afb3950e87ba5724",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nfs_nfsserver-ubuntuserver-18.04",
                "id": "US-SC:6000C29a770013a930d717463fcad6a1",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_standard_64-bit",
                "id": "US-SC:6000C29a99c7cc5d67b773c85d017307",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_32-bit",
                "id": "US-SC:6000C29a9eb2046f9d486e0297051ec8",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_tomcat_tomcat-8-ubuntuserver-18.04",
                "id": "US-SC:6000C29ab1e22c5da5c8834442d97da7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_magento_magento-2.3-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-SC:6000C29ac6ac759b2ac9a121015cbe35",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-64-bit",
                "id": "US-SC:6000C29ad2662cd36cbf937fd7b46fd4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_redmine_redmine-4.0-ubuntuserver-18.04-mysqlserver-5.7",
                "id": "US-SC:6000C29b1af5c41bcfb0bfc9a8a09ff3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.6-ubuntuserver-18.04",
                "id": "US-SC:6000C29b30e4d970258a3e02b26f884a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_joomla_joomla-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-SC:6000C29b3a176f8fbeeaef8cabc285f7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_basic_server",
                "id": "US-SC:6000C29b6395b4cc22896d745fa1a5c4",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-csf-cmc-liveinstall-centos-7.4-64-bit-minimal",
                "id": "US-SC:6000C29b961d6c43182a64407d951542",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_64-bit",
                "id": "US-SC:6000C29bb8fde673f515caf9bed695a1",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_minimal",
                "id": "US-SC:6000C29c258bce8d868fa38afb946073",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_minio_minio-latest-ubuntuserver-18.04",
                "id": "US-SC:6000C29c540ff1dbace7682100bb3282",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_dokuwiki_dokuwiki-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "US-SC:6000C29c54ed40e5880c90ef8a6115bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_openvpn_openvpn-2.6.1-ubuntuserver-18.04",
                "id": "US-SC:6000C29c894a1cd4f38f1db3d72cc5ea",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_basic_server",
                "id": "US-SC:6000C29c9bfc5ab3a09ff3a80dfe46ce",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_desktop_7.4_64-bit_gnome",
                "id": "US-SC:6000C29ce092378f6d9f2985c7ebdb49",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_32-bit",
                "id": "US-SC:6000C29cebd37daa2ee4d7f6de19e931",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-8.0-ubuntuserver-18.04",
                "id": "US-SC:6000C29d16b1507a7a92873aa813eb0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_wordpress-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-SC:6000C29d365974def3ea2ae16eaa5f0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_64-bit",
                "id": "US-SC:6000C29d4049980bd16c74aa8ba91c9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpmyadmin_phpmyadmin-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "US-SC:6000C29d6adcf6f7bbc0b10a42860eda",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-5.7-ubuntuserver-18.04",
                "id": "US-SC:6000C29d9e2994c7ea6e03d8f470bda3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_standard_64-bit",
                "id": "US-SC:6000C29e684efebf574b286df3b4ff4f",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-11-ubuntuserver-18.04",
                "id": "US-SC:6000C29ea9dccc977a7cec3c16162d96",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_docker-ready-ubuntuserver-18.04",
                "id": "US-SC:6000C29f1950d63de8fed8095fdf6e64",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-32-bit",
                "id": "US-SC:6000C29f24bc8ec8a605b6d7bfe58835",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-dnsonly-liveinstall-centos-7.4_64-bit-minimal",
                "id": "US-SC:6000C29f5b14b91631c7678a2dc4b8cf",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-4.0-ubuntuserver-18.04",
                "id": "US-SC:6000C29f62a7292b19903fb7bdc4d7da",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.4-ubuntuserver-18.04",
                "id": "US-SC:6000C29fd761c6f26056d138e165b2bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            }
        ],
        "US-TX": [
            {
                "description": "ubuntu_server_16.04_32-bit",
                "id": "US-TX:6000C2901a61dff371f4d1d34bd9548b",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit_optimized_updated",
                "id": "US-TX:6000C2904fc6d8295d2b6d9687ed955e",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_zevenet_zevenet-latest-ubuntuserver-18.04",
                "id": "US-TX:6000C2909e0736f7b76b1dc70d11567e",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_memcached_memcached-latest-ubuntuserver-18.04",
                "id": "US-TX:6000C290a79ae490560b068973cb35f9",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_minimal",
                "id": "US-TX:6000C291195abef23f2815c6f7cc301a",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome",
                "id": "US-TX:6000C2914d34f8fb8b449a686c6df4a5",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_freenas_11.1_64bit",
                "id": "US-TX:6000C2916500bde8a8dba053a727a2fd",
                "sizeGB": 2,
                "usageInfo": "FreeNAS is a free and open-source network-attached storage (NAS) software based on FreeBSD and the OpenZFS file system. Provides Storage Appliance supported SMB, AFP, NFS, iSCSI, SSH, rsync and FTP\/TFTP protocols. Advanced FreeNAS features include full-disk encryption and a plug-in architecture for third-party software.\n\nConnect to FreeNAS with HTTPS Protocol:\n\nhttps:\/\/{server-ip-address]\/\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_15.04_64-bit",
                "id": "US-TX:6000C29188a2a1c97070d1d6fb71ee89",
                "sizeGB": 5,
                "usageInfo": "In order to connect to the server with SSH, use Putty SSH Client or any other SSH Client with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nYou can find the server\'s details below.",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_7.4_64-bit_basic_server",
                "id": "US-TX:6000C291a7dbc4a539dc4500ed1975c5",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-liveinstall-centos-7.4-64-bit-minimal",
                "id": "US-TX:6000C291ac5094ec6fe3dabe0baca794",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_basic_server",
                "id": "US-TX:6000C2924b678625c2b07d04b4978e18",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_nginx-mysql-php7",
                "id": "US-TX:6000C2929e92b7444e77af9b149bc9f4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-7.4-64-bit",
                "id": "US-TX:6000C2935944aaac4c21701d3cde9610",
                "sizeGB": 15,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.2-ubuntuserver-18.04",
                "id": "US-TX:6000C29373bf2a83a8c8610ab80234e7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_32-bit",
                "id": "US-TX:6000C29386a7def39b3fc7e4d88eba8c",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpbb_phpbb-3.2.5-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-TX:6000C293bacc4ad2e026f66939baff71",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_standard_64-bit",
                "id": "US-TX:6000C2947a5d7c8fead78a1ec1224fdf",
                "sizeGB": 23,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2012_r2_datacenter_64-bit",
                "id": "US-TX:6000C294fa713a5218e4d2fe9e6026c8",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_jenkins_jenkins-latest-ubuntuserver-18.04",
                "id": "US-TX:6000C295159bc110a5482400667a7cd8",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_64-bit",
                "id": "US-TX:6000C29541e39a9892043d7237503d06",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_desktop_8.6_64-bit_xfce4",
                "id": "US-TX:6000C2956fdfc1fa3ffe061ba7bd46ce",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_64-bit",
                "id": "US-TX:6000C29574cbda93387eac758727a6c9",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_32-bit",
                "id": "US-TX:6000C295834b332b89f79521cdabca9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_datacenter_64-bit",
                "id": "US-TX:6000C2960d7769492105a558d145c7d3",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)Username: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-10-ubuntuserver-18.04",
                "id": "US-TX:6000C2967a1c0e996b1fadc4b42aa10f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_minimal",
                "id": "US-TX:6000C296c816785af0416189ce873152",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_12.04_32-bit",
                "id": "US-TX:6000C296d934a62e14bd45586beeec3f",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_minimal",
                "id": "US-TX:6000C29786f615663312af9d49bba1ef",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_64-bit_minimal",
                "id": "US-TX:6000C2979e186bf7a61242f3bc49c945",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_desktop_16.04_64-bit_gnome_xrdp",
                "id": "US-TX:6000C297b448da1e088f8bc4eb0be63c",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_windows_10_desktop_64-bit",
                "id": "US-TX:6000C2982b0030c2dbf98bcb092f92b4",
                "sizeGB": 25,
                "usageInfo": "Connect to the desktop via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your desktop)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_6.9_32-bit_basic_server",
                "id": "US-TX:6000C2982cc1f899e74c4f39a9e81998",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_32bit",
                "id": "US-TX:6000C2983bdd8b531ecfc6d892a35aa4",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_lemp_lemp-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-TX:6000C2983ff90afd6b38b5f897e32d06",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_nextcloud_nextcloud-15-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-TX:6000C2985991f64467b47d662bcb90bf",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_drupal_drupal-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-TX:6000C29863642e2615dcf655f5c2079f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.4_64-bit",
                "id": "US-TX:6000C2988f5660c446590588b456ba80",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_datacenter_64-bit",
                "id": "US-TX:6000C298abe9aa378af7832e3d7de7b6",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "freebsd_11.1_64bit",
                "id": "US-TX:6000C298bb2e4ea0f1891cd81735d24e",
                "sizeGB": 2,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_16.04_64-bit",
                "id": "US-TX:6000C298bbb2d3b6e9721f4f4f3c5bf0",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_enterprise_64-bit",
                "id": "US-TX:6000C298c677d7da830e4f3ae1765c7e",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_ubuntu64",
                "id": "US-TX:6000C29919a41ecc0c790bf1437db1b0",
                "sizeGB": 15,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nOnce you have logged in, a simple console interface will appear and allow you to configure your site, ftp accounts, SSLs and more server configurations.\n\nWe recommend running \"apt update\" after server provisioning to update to the latest versions available on this Ubuntu\'s Distribution.\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_pfsense_2.4_64bit",
                "id": "US-TX:6000C299bd669da13cf92d780e19674d",
                "sizeGB": 2,
                "usageInfo": "Connect to the firewall using HTTPS protocol, \n\nhttps:\/\/{server-ip-address]\/\nUsername: admin\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_redis_redisserver-latest-ubuntuserver-18.04",
                "id": "US-TX:6000C299c73cf650577c6e9781938225",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_14.04_64-bit",
                "id": "US-TX:6000C299f04969dee8d55d2d3f0dbb96",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "ubuntu_server_18.04_64-bit",
                "id": "US-TX:6000C29a5a7220dcf84716e7bba74215",
                "sizeGB": 4,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_dockermachinecli-0.16-ubuntuserver-18.04",
                "id": "US-TX:6000C29a64893c54afb3950e87ba5724",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nfs_nfsserver-ubuntuserver-18.04",
                "id": "US-TX:6000C29a770013a930d717463fcad6a1",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2016_standard_64-bit",
                "id": "US-TX:6000C29a99c7cc5d67b773c85d017307",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_32-bit",
                "id": "US-TX:6000C29a9eb2046f9d486e0297051ec8",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_tomcat_tomcat-8-ubuntuserver-18.04",
                "id": "US-TX:6000C29ab1e22c5da5c8834442d97da7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_magento_magento-2.3-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-TX:6000C29ac6ac759b2ac9a121015cbe35",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-64-bit",
                "id": "US-TX:6000C29ad2662cd36cbf937fd7b46fd4",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_redmine_redmine-4.0-ubuntuserver-18.04-mysqlserver-5.7",
                "id": "US-TX:6000C29b1af5c41bcfb0bfc9a8a09ff3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.6-ubuntuserver-18.04",
                "id": "US-TX:6000C29b30e4d970258a3e02b26f884a",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_joomla_joomla-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-TX:6000C29b3a176f8fbeeaef8cabc285f7",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_32-bit_basic_server",
                "id": "US-TX:6000C29b6395b4cc22896d745fa1a5c4",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-csf-cmc-liveinstall-centos-7.4-64-bit-minimal",
                "id": "US-TX:6000C29b961d6c43182a64407d951542",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:\n",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_8.9_64-bit",
                "id": "US-TX:6000C29bb8fde673f515caf9bed695a1",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_minimal",
                "id": "US-TX:6000C29c258bce8d868fa38afb946073",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_minio_minio-latest-ubuntuserver-18.04",
                "id": "US-TX:6000C29c540ff1dbace7682100bb3282",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_dokuwiki_dokuwiki-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "US-TX:6000C29c54ed40e5880c90ef8a6115bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_openvpn_openvpn-2.6.1-ubuntuserver-18.04",
                "id": "US-TX:6000C29c894a1cd4f38f1db3d72cc5ea",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_5.11_64-bit_basic_server",
                "id": "US-TX:6000C29c9bfc5ab3a09ff3a80dfe46ce",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "centos_desktop_7.4_64-bit_gnome",
                "id": "US-TX:6000C29ce092378f6d9f2985c7ebdb49",
                "sizeGB": 10,
                "usageInfo": "Connect to the desktop is done via VNC client (such as TightVNC, UltraVNC or any other VNC client).\n\nPassword to the VNC connection is the same password you have entered in the Create New Server process.\n\nOn the VNC client put in the IP address below and add   \":1\"  or \":2\" to choose the selected desktop.\n\nFor example:\nTo connect to vncuser desktop type: {IP_ADDRESS}:1 \nTo connect to root desktop type: {IP_ADDRESS}:2\n\n# Please be aware that vnc password can only contain 8 characters, if you set a password longer than 8 characters, only the first 8 characters will count on the vnc connection.\n\nDesktop\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_7.11_32-bit",
                "id": "US-TX:6000C29cebd37daa2ee4d7f6de19e931",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-8.0-ubuntuserver-18.04",
                "id": "US-TX:6000C29d16b1507a7a92873aa813eb0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_wordpress_wordpress-latest-ubuntuserver-18.04-nginx-mysqlserver-5.7-php-7.2-phpfpm",
                "id": "US-TX:6000C29d365974def3ea2ae16eaa5f0f",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "debian_9.2_64-bit",
                "id": "US-TX:6000C29d4049980bd16c74aa8ba91c9e",
                "sizeGB": 5,
                "usageInfo": "Connect to the server via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below.\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_phpmyadmin_phpmyadmin-latest-ubuntuserver-18.04-nginx-php-7.2-phpfpm",
                "id": "US-TX:6000C29d6adcf6f7bbc0b10a42860eda",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mysql_mysqlserver-5.7-ubuntuserver-18.04",
                "id": "US-TX:6000C29d9e2994c7ea6e03d8f470bda3",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "windows_server_2008_r2_standard_64-bit",
                "id": "US-TX:6000C29e684efebf574b286df3b4ff4f",
                "sizeGB": 25,
                "usageInfo": "Connect to server via Microsoft Remote Desktop protocol (RDP Client),\n\nUsing Microsoft Windows:\nClick the Start Button then type \"mstsc\"\n(For older Windows OS Click Start->Run, then type \"mstsc\")\n\nUsing macOS X, Linux, iOS or Android device, download Remote Desktop Client (RDP Client) and use the connection credentials below.\n\nHostname\/IP Address: (See below the IP address assigned to your server)\nUsername: administrator\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_nodejs_nodejs-11-ubuntuserver-18.04",
                "id": "US-TX:6000C29ea9dccc977a7cec3c16162d96",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_docker_docker-ready-ubuntuserver-18.04",
                "id": "US-TX:6000C29f1950d63de8fed8095fdf6e64",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-installed-centos-6.5-32-bit",
                "id": "US-TX:6000C29f24bc8ec8a605b6d7bfe58835",
                "sizeGB": 10,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "apps_cpanelwhm_cpanelwhm-dnsonly-liveinstall-centos-7.4_64-bit-minimal",
                "id": "US-TX:6000C29f5b14b91631c7678a2dc4b8cf",
                "sizeGB": 20,
                "usageInfo": "Connect to the server\'s WHM\/cPanel Control Panel via browser with the following URL: https:\/\/{SERVER_IP_ADDRESS}:2087 -\n\nConnect to the server\'s console via SSH protocol (use Putty SSH Client or any other SSH Client) with the credentials below,\n\nUsername: root\nPassword: (Use the password that you typed when creating server)\n\nServer\'s configuration and details:",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-4.0-ubuntuserver-18.04",
                "id": "US-TX:6000C29f62a7292b19903fb7bdc4d7da",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            },
            {
                "description": "service_mongodb_mongodb-3.4-ubuntuserver-18.04",
                "id": "US-TX:6000C29fd761c6f26056d138e165b2bd",
                "sizeGB": 4,
                "usageInfo": "",
                "guestDescription": "",
                "freeTextOne": "",
                "freeTextTwo": ""
            }
        ]
    },
    "traffic": {
        "AS": [
            {
                "id": 8,
                "info": "200GB of traffic"
            }
        ],
        "CA-TR": [
            {
                "id": "b50",
                "info": "50Mbit\/Sec, Unmetered"
            },
            {
                "id": "t5000",
                "info": "5000GB of traffic"
            }
        ],
        "DEV": [
            {
                "id": 30,
                "info": "20Mbit\/Sec, Unmetered"
            },
            {
                "id": 29,
                "info": "5000GB of traffic"
            }
        ],
        "EU": [
            {
                "id": 4,
                "info": "20Mbit\/Sec, Unmetered"
            },
            {
                "id": 3,
                "info": "5000GB of traffic"
            }
        ],
        "EU-FR": [
            {
                "id": "b20",
                "info": "20Mbit\/Sec, Unmetered"
            },
            {
                "id": "t5000",
                "info": "5000GB of traffic"
            }
        ],
        "EU-LO": [
            {
                "id": 17,
                "info": "20Mbit\/Sec, Unmetered"
            },
            {
                "id": 16,
                "info": "5000GB of traffic"
            }
        ],
        "IL": [
            {
                "id": 10,
                "info": "50Mbit\/Sec, Unmetered"
            },
            {
                "id": 9,
                "info": "5000GB of traffic"
            }
        ],
        "IL-JR": [
            {
                "id": 28,
                "info": "50Mbit\/Sec, Unmetered"
            },
            {
                "id": 27,
                "info": "5000GB of traffic"
            }
        ],
        "IL-PT": [
            {
                "id": 24,
                "info": "50Mbit\/Sec, Unmetered"
            },
            {
                "id": 21,
                "info": "5000GB of traffic"
            }
        ],
        "IL-RH": [
            {
                "id": 12,
                "info": "50Mbit\/Sec, Unmetered"
            },
            {
                "id": 11,
                "info": "5000GB of traffic"
            }
        ],
        "IL-TA": [
            {
                "id": 22,
                "info": "50Mbit\/Sec, Unmetered"
            },
            {
                "id": 23,
                "info": "5000GB of traffic"
            }
        ],
        "US-NY2": [
            {
                "id": 15,
                "info": "20Mbit\/Sec, Unmetered"
            },
            {
                "id": 14,
                "info": "5000GB of traffic"
            }
        ],
        "US-SC": [
            {
                "id": 19,
                "info": "20Mbit\/Sec, Unmetered"
            },
            {
                "id": 18,
                "info": "5000GB of traffic"
            }
        ],
        "US-TX": [
            {
                "id": 25,
                "info": "20Mbit\/Sec, Unmetered"
            },
            {
                "id": 26,
                "info": "5000GB of traffic"
            }
        ]
    },
    "networks": {
        "AS": [
            {
                "name": "wan",
                "ips": "auto"
            }
        ],
        "CA-TR": [
            {
                "name": "wan",
                "ips": "auto"
            }
        ],
        "DEV": [],
        "EU": [
            {
                "name": "wan",
                "ips": "auto"
            }
        ],
        "EU-FR": [
            {
                "name": "wan",
                "ips": "auto"
            }
        ],
        "EU-LO": [
            {
                "name": "wan",
                "ips": "auto"
            }
        ],
        "IL": [
            {
                "name": "wan",
                "ips": "auto"
            },
            {
                "name": "lan-82133-x3223f-cluster",
                "ips": [
                    "172.16.0.5",
                    "172.16.0.6",
                    "172.16.0.7",
                    "172.16.0.8",
                    "172.16.0.9",
                    "172.16.0.10",
                    "172.16.0.11",
                    "172.16.0.12",
                    "172.16.0.13",
                    "172.16.0.14",
                    "172.16.0.15",
                    "172.16.0.16",
                    "172.16.0.17",
                    "172.16.0.18",
                    "172.16.0.19",
                    "172.16.0.20",
                    "172.16.0.21",
                    "172.16.0.22",
                    "172.16.0.23",
                    "172.16.0.24",
                    "172.16.0.25",
                    "172.16.0.26",
                    "172.16.0.27",
                    "172.16.0.28",
                    "172.16.0.29",
                    "172.16.0.30",
                    "172.16.0.31",
                    "172.16.0.32",
                    "172.16.0.33",
                    "172.16.0.34",
                    "172.16.0.35",
                    "172.16.0.36",
                    "172.16.0.37",
                    "172.16.0.38",
                    "172.16.0.39",
                    "172.16.0.40",
                    "172.16.0.41",
                    "172.16.0.42",
                    "172.16.0.43",
                    "172.16.0.44",
                    "172.16.0.45",
                    "172.16.0.46",
                    "172.16.0.47",
                    "172.16.0.48",
                    "172.16.0.49",
                    "172.16.0.50",
                    "172.16.0.51",
                    "172.16.0.52",
                    "172.16.0.53",
                    "172.16.0.54",
                    "172.16.0.55",
                    "172.16.0.56",
                    "172.16.0.57",
                    "172.16.0.58",
                    "172.16.0.59",
                    "172.16.0.60",
                    "172.16.0.61",
                    "172.16.0.62",
                    "172.16.0.63",
                    "172.16.0.64",
                    "172.16.0.65",
                    "172.16.0.66",
                    "172.16.0.67",
                    "172.16.0.68",
                    "172.16.0.69",
                    "172.16.0.70",
                    "172.16.0.71",
                    "172.16.0.72",
                    "172.16.0.73",
                    "172.16.0.74",
                    "172.16.0.75",
                    "172.16.0.76",
                    "172.16.0.77",
                    "172.16.0.78",
                    "172.16.0.79",
                    "172.16.0.80",
                    "172.16.0.81",
                    "172.16.0.82",
                    "172.16.0.83",
                    "172.16.0.84",
                    "172.16.0.85",
                    "172.16.0.86",
                    "172.16.0.87",
                    "172.16.0.88",
                    "172.16.0.89",
                    "172.16.0.90",
                    "172.16.0.91",
                    "172.16.0.92",
                    "172.16.0.93",
                    "172.16.0.94",
                    "172.16.0.95",
                    "172.16.0.96",
                    "172.16.0.97",
                    "172.16.0.98",
                    "172.16.0.99",
                    "172.16.0.100",
                    "172.16.0.101",
                    "172.16.0.102",
                    "172.16.0.103",
                    "172.16.0.104",
                    "172.16.0.105",
                    "172.16.0.106",
                    "172.16.0.107",
                    "172.16.0.108",
                    "172.16.0.109",
                    "172.16.0.110",
                    "172.16.0.111",
                    "172.16.0.112",
                    "172.16.0.113",
                    "172.16.0.114",
                    "172.16.0.115",
                    "172.16.0.116",
                    "172.16.0.117",
                    "172.16.0.118",
                    "172.16.0.119",
                    "172.16.0.120",
                    "172.16.0.121",
                    "172.16.0.122",
                    "172.16.0.123",
                    "172.16.0.124",
                    "172.16.0.125",
                    "172.16.0.126",
                    "172.16.0.127",
                    "172.16.0.128",
                    "172.16.0.129",
                    "172.16.0.130",
                    "172.16.0.131",
                    "172.16.0.132",
                    "172.16.0.133",
                    "172.16.0.134",
                    "172.16.0.135",
                    "172.16.0.136",
                    "172.16.0.137",
                    "172.16.0.138",
                    "172.16.0.139",
                    "172.16.0.140",
                    "172.16.0.141",
                    "172.16.0.142",
                    "172.16.0.143",
                    "172.16.0.144",
                    "172.16.0.145",
                    "172.16.0.146",
                    "172.16.0.147",
                    "172.16.0.148",
                    "172.16.0.149",
                    "172.16.0.150",
                    "172.16.0.151",
                    "172.16.0.152",
                    "172.16.0.153",
                    "172.16.0.154",
                    "172.16.0.155",
                    "172.16.0.156",
                    "172.16.0.157",
                    "172.16.0.158",
                    "172.16.0.159",
                    "172.16.0.160",
                    "172.16.0.161",
                    "172.16.0.162",
                    "172.16.0.163",
                    "172.16.0.164",
                    "172.16.0.165",
                    "172.16.0.166",
                    "172.16.0.167",
                    "172.16.0.168",
                    "172.16.0.169",
                    "172.16.0.170",
                    "172.16.0.171",
                    "172.16.0.172",
                    "172.16.0.173",
                    "172.16.0.174",
                    "172.16.0.175",
                    "172.16.0.176",
                    "172.16.0.177",
                    "172.16.0.178",
                    "172.16.0.179",
                    "172.16.0.180",
                    "172.16.0.181",
                    "172.16.0.182",
                    "172.16.0.183",
                    "172.16.0.184",
                    "172.16.0.185",
                    "172.16.0.186",
                    "172.16.0.187",
                    "172.16.0.188",
                    "172.16.0.189",
                    "172.16.0.190",
                    "172.16.0.191",
                    "172.16.0.192",
                    "172.16.0.193",
                    "172.16.0.194",
                    "172.16.0.195",
                    "172.16.0.196",
                    "172.16.0.197",
                    "172.16.0.198",
                    "172.16.0.199",
                    "172.16.0.200",
                    "172.16.0.201",
                    "172.16.0.202",
                    "172.16.0.203",
                    "172.16.0.204",
                    "172.16.0.205",
                    "172.16.0.206",
                    "172.16.0.207",
                    "172.16.0.208",
                    "172.16.0.209",
                    "172.16.0.210",
                    "172.16.0.211",
                    "172.16.0.212",
                    "172.16.0.213",
                    "172.16.0.214",
                    "172.16.0.215",
                    "172.16.0.216",
                    "172.16.0.217",
                    "172.16.0.218",
                    "172.16.0.219",
                    "172.16.0.220",
                    "172.16.0.221",
                    "172.16.0.222",
                    "172.16.0.223",
                    "172.16.0.224",
                    "172.16.0.225",
                    "172.16.0.226",
                    "172.16.0.227",
                    "172.16.0.228",
                    "172.16.0.229",
                    "172.16.0.230",
                    "172.16.0.231",
                    "172.16.0.232",
                    "172.16.0.233",
                    "172.16.0.234",
                    "172.16.0.235",
                    "172.16.0.236",
                    "172.16.0.237",
                    "172.16.0.238",
                    "172.16.0.239",
                    "172.16.0.240",
                    "172.16.0.241",
                    "172.16.0.242",
                    "172.16.0.243",
                    "172.16.0.244",
                    "172.16.0.245",
                    "172.16.0.246",
                    "172.16.0.247",
                    "172.16.0.248",
                    "172.16.0.249",
                    "172.16.0.250",
                    "172.16.0.251",
                    "172.16.0.252",
                    "172.16.0.253",
                    "172.16.0.254",
                    "172.16.0.255",
                    "172.16.1.0",
                    "172.16.1.1",
                    "172.16.1.2",
                    "172.16.1.3",
                    "172.16.1.4",
                    "172.16.1.5",
                    "172.16.1.6",
                    "172.16.1.7",
                    "172.16.1.8",
                    "172.16.1.9",
                    "172.16.1.10",
                    "172.16.1.11",
                    "172.16.1.12",
                    "172.16.1.13",
                    "172.16.1.14",
                    "172.16.1.15",
                    "172.16.1.16",
                    "172.16.1.17",
                    "172.16.1.18",
                    "172.16.1.19",
                    "172.16.1.20",
                    "172.16.1.21",
                    "172.16.1.22",
                    "172.16.1.23",
                    "172.16.1.24",
                    "172.16.1.25",
                    "172.16.1.26",
                    "172.16.1.27",
                    "172.16.1.28",
                    "172.16.1.29",
                    "172.16.1.30",
                    "172.16.1.31",
                    "172.16.1.32",
                    "172.16.1.33",
                    "172.16.1.34",
                    "172.16.1.35",
                    "172.16.1.36",
                    "172.16.1.37",
                    "172.16.1.38",
                    "172.16.1.39",
                    "172.16.1.40",
                    "172.16.1.41",
                    "172.16.1.42",
                    "172.16.1.43",
                    "172.16.1.44",
                    "172.16.1.45",
                    "172.16.1.46",
                    "172.16.1.47",
                    "172.16.1.48",
                    "172.16.1.49",
                    "172.16.1.50",
                    "172.16.1.51",
                    "172.16.1.52",
                    "172.16.1.53",
                    "172.16.1.54",
                    "172.16.1.55",
                    "172.16.1.56",
                    "172.16.1.57",
                    "172.16.1.58",
                    "172.16.1.59",
                    "172.16.1.60",
                    "172.16.1.61",
                    "172.16.1.62",
                    "172.16.1.63",
                    "172.16.1.64",
                    "172.16.1.65",
                    "172.16.1.66",
                    "172.16.1.67",
                    "172.16.1.68",
                    "172.16.1.69",
                    "172.16.1.70",
                    "172.16.1.71",
                    "172.16.1.72",
                    "172.16.1.73",
                    "172.16.1.74",
                    "172.16.1.75",
                    "172.16.1.76",
                    "172.16.1.77",
                    "172.16.1.78",
                    "172.16.1.79",
                    "172.16.1.80",
                    "172.16.1.81",
                    "172.16.1.82",
                    "172.16.1.83",
                    "172.16.1.84",
                    "172.16.1.85",
                    "172.16.1.86",
                    "172.16.1.87",
                    "172.16.1.88",
                    "172.16.1.89",
                    "172.16.1.90",
                    "172.16.1.91",
                    "172.16.1.92",
                    "172.16.1.93",
                    "172.16.1.94",
                    "172.16.1.95",
                    "172.16.1.96",
                    "172.16.1.97",
                    "172.16.1.98",
                    "172.16.1.99",
                    "172.16.1.100",
                    "172.16.1.101",
                    "172.16.1.102",
                    "172.16.1.103",
                    "172.16.1.104",
                    "172.16.1.105",
                    "172.16.1.106",
                    "172.16.1.107",
                    "172.16.1.108",
                    "172.16.1.109",
                    "172.16.1.110",
                    "172.16.1.111",
                    "172.16.1.112",
                    "172.16.1.113",
                    "172.16.1.114",
                    "172.16.1.115",
                    "172.16.1.116",
                    "172.16.1.117",
                    "172.16.1.118",
                    "172.16.1.119",
                    "172.16.1.120",
                    "172.16.1.121",
                    "172.16.1.122",
                    "172.16.1.123",
                    "172.16.1.124",
                    "172.16.1.125",
                    "172.16.1.126",
                    "172.16.1.127",
                    "172.16.1.128",
                    "172.16.1.129",
                    "172.16.1.130",
                    "172.16.1.131",
                    "172.16.1.132",
                    "172.16.1.133",
                    "172.16.1.134",
                    "172.16.1.135",
                    "172.16.1.136",
                    "172.16.1.137",
                    "172.16.1.138",
                    "172.16.1.139",
                    "172.16.1.140",
                    "172.16.1.141",
                    "172.16.1.142",
                    "172.16.1.143",
                    "172.16.1.144",
                    "172.16.1.145",
                    "172.16.1.146",
                    "172.16.1.147",
                    "172.16.1.148",
                    "172.16.1.149",
                    "172.16.1.150",
                    "172.16.1.151",
                    "172.16.1.152",
                    "172.16.1.153",
                    "172.16.1.154",
                    "172.16.1.155",
                    "172.16.1.156",
                    "172.16.1.157",
                    "172.16.1.158",
                    "172.16.1.159",
                    "172.16.1.160",
                    "172.16.1.161",
                    "172.16.1.162",
                    "172.16.1.163",
                    "172.16.1.164",
                    "172.16.1.165",
                    "172.16.1.166",
                    "172.16.1.167",
                    "172.16.1.168",
                    "172.16.1.169",
                    "172.16.1.170",
                    "172.16.1.171",
                    "172.16.1.172",
                    "172.16.1.173",
                    "172.16.1.174",
                    "172.16.1.175",
                    "172.16.1.176",
                    "172.16.1.177",
                    "172.16.1.178",
                    "172.16.1.179",
                    "172.16.1.180",
                    "172.16.1.181",
                    "172.16.1.182",
                    "172.16.1.183",
                    "172.16.1.184",
                    "172.16.1.185",
                    "172.16.1.186",
                    "172.16.1.187",
                    "172.16.1.188",
                    "172.16.1.189",
                    "172.16.1.190",
                    "172.16.1.191",
                    "172.16.1.192",
                    "172.16.1.193",
                    "172.16.1.194",
                    "172.16.1.195",
                    "172.16.1.196",
                    "172.16.1.197",
                    "172.16.1.198",
                    "172.16.1.199",
                    "172.16.1.200",
                    "172.16.1.201",
                    "172.16.1.202",
                    "172.16.1.203",
                    "172.16.1.204",
                    "172.16.1.205",
                    "172.16.1.206",
                    "172.16.1.207",
                    "172.16.1.208",
                    "172.16.1.209",
                    "172.16.1.210",
                    "172.16.1.211",
                    "172.16.1.212",
                    "172.16.1.213",
                    "172.16.1.214",
                    "172.16.1.215",
                    "172.16.1.216",
                    "172.16.1.217",
                    "172.16.1.218",
                    "172.16.1.219",
                    "172.16.1.220",
                    "172.16.1.221",
                    "172.16.1.222",
                    "172.16.1.223",
                    "172.16.1.224",
                    "172.16.1.225",
                    "172.16.1.226",
                    "172.16.1.227",
                    "172.16.1.228",
                    "172.16.1.229",
                    "172.16.1.230",
                    "172.16.1.231",
                    "172.16.1.232",
                    "172.16.1.233",
                    "172.16.1.234",
                    "172.16.1.235",
                    "172.16.1.236",
                    "172.16.1.237",
                    "172.16.1.238",
                    "172.16.1.239",
                    "172.16.1.240",
                    "172.16.1.241",
                    "172.16.1.242",
                    "172.16.1.243",
                    "172.16.1.244",
                    "172.16.1.245",
                    "172.16.1.246",
                    "172.16.1.247",
                    "172.16.1.248",
                    "172.16.1.249",
                    "172.16.1.250",
                    "172.16.1.251",
                    "172.16.1.252",
                    "172.16.1.253",
                    "172.16.1.254"
                ]
            },
            {
                "name": "lan-82133-lan",
                "ips": [
                    "172.16.0.1",
                    "172.16.0.2",
                    "172.16.0.3",
                    "172.16.0.4",
                    "172.16.0.5",
                    "172.16.0.6",
                    "172.16.0.7",
                    "172.16.0.8",
                    "172.16.0.9",
                    "172.16.0.10",
                    "172.16.0.11",
                    "172.16.0.12",
                    "172.16.0.13",
                    "172.16.0.14",
                    "172.16.0.15",
                    "172.16.0.16",
                    "172.16.0.17",
                    "172.16.0.18",
                    "172.16.0.19",
                    "172.16.0.20",
                    "172.16.0.21",
                    "172.16.0.22",
                    "172.16.0.23",
                    "172.16.0.24",
                    "172.16.0.25",
                    "172.16.0.26",
                    "172.16.0.27",
                    "172.16.0.28",
                    "172.16.0.29",
                    "172.16.0.30",
                    "172.16.0.31",
                    "172.16.0.32",
                    "172.16.0.33",
                    "172.16.0.34",
                    "172.16.0.35",
                    "172.16.0.36",
                    "172.16.0.37",
                    "172.16.0.38",
                    "172.16.0.39",
                    "172.16.0.40",
                    "172.16.0.41",
                    "172.16.0.42",
                    "172.16.0.43",
                    "172.16.0.44",
                    "172.16.0.45",
                    "172.16.0.46",
                    "172.16.0.47",
                    "172.16.0.48",
                    "172.16.0.49",
                    "172.16.0.50",
                    "172.16.0.51",
                    "172.16.0.52",
                    "172.16.0.53",
                    "172.16.0.54",
                    "172.16.0.55",
                    "172.16.0.56",
                    "172.16.0.57",
                    "172.16.0.58",
                    "172.16.0.59",
                    "172.16.0.60",
                    "172.16.0.61",
                    "172.16.0.62",
                    "172.16.0.63",
                    "172.16.0.64",
                    "172.16.0.65",
                    "172.16.0.66",
                    "172.16.0.67",
                    "172.16.0.68",
                    "172.16.0.69",
                    "172.16.0.70",
                    "172.16.0.71",
                    "172.16.0.72",
                    "172.16.0.73",
                    "172.16.0.74",
                    "172.16.0.75",
                    "172.16.0.76",
                    "172.16.0.77",
                    "172.16.0.78",
                    "172.16.0.79",
                    "172.16.0.80",
                    "172.16.0.81",
                    "172.16.0.82",
                    "172.16.0.83",
                    "172.16.0.84",
                    "172.16.0.85",
                    "172.16.0.86",
                    "172.16.0.87",
                    "172.16.0.88",
                    "172.16.0.89",
                    "172.16.0.90",
                    "172.16.0.91",
                    "172.16.0.92",
                    "172.16.0.93",
                    "172.16.0.94",
                    "172.16.0.95",
                    "172.16.0.96",
                    "172.16.0.97",
                    "172.16.0.98",
                    "172.16.0.99",
                    "172.16.0.100",
                    "172.16.0.101",
                    "172.16.0.102",
                    "172.16.0.103",
                    "172.16.0.104",
                    "172.16.0.105",
                    "172.16.0.106",
                    "172.16.0.107",
                    "172.16.0.108",
                    "172.16.0.109",
                    "172.16.0.110",
                    "172.16.0.111",
                    "172.16.0.112",
                    "172.16.0.113",
                    "172.16.0.114",
                    "172.16.0.115",
                    "172.16.0.116",
                    "172.16.0.117",
                    "172.16.0.118",
                    "172.16.0.119",
                    "172.16.0.120",
                    "172.16.0.121",
                    "172.16.0.122",
                    "172.16.0.123",
                    "172.16.0.124",
                    "172.16.0.125",
                    "172.16.0.126",
                    "172.16.0.127",
                    "172.16.0.128",
                    "172.16.0.129",
                    "172.16.0.130",
                    "172.16.0.131",
                    "172.16.0.132",
                    "172.16.0.133",
                    "172.16.0.134",
                    "172.16.0.135",
                    "172.16.0.136",
                    "172.16.0.137",
                    "172.16.0.138",
                    "172.16.0.139",
                    "172.16.0.140",
                    "172.16.0.141",
                    "172.16.0.142",
                    "172.16.0.143",
                    "172.16.0.144",
                    "172.16.0.145",
                    "172.16.0.146",
                    "172.16.0.147",
                    "172.16.0.148",
                    "172.16.0.149",
                    "172.16.0.150",
                    "172.16.0.151",
                    "172.16.0.152",
                    "172.16.0.153",
                    "172.16.0.154",
                    "172.16.0.155",
                    "172.16.0.156",
                    "172.16.0.157",
                    "172.16.0.158",
                    "172.16.0.159",
                    "172.16.0.160",
                    "172.16.0.161",
                    "172.16.0.162",
                    "172.16.0.163",
                    "172.16.0.164",
                    "172.16.0.165",
                    "172.16.0.166",
                    "172.16.0.167",
                    "172.16.0.168",
                    "172.16.0.169",
                    "172.16.0.170",
                    "172.16.0.171",
                    "172.16.0.172",
                    "172.16.0.173",
                    "172.16.0.174",
                    "172.16.0.175",
                    "172.16.0.176",
                    "172.16.0.177",
                    "172.16.0.178",
                    "172.16.0.179",
                    "172.16.0.180",
                    "172.16.0.181",
                    "172.16.0.182",
                    "172.16.0.183",
                    "172.16.0.184",
                    "172.16.0.185",
                    "172.16.0.186",
                    "172.16.0.187",
                    "172.16.0.188",
                    "172.16.0.189",
                    "172.16.0.190",
                    "172.16.0.191",
                    "172.16.0.192",
                    "172.16.0.193",
                    "172.16.0.194",
                    "172.16.0.195",
                    "172.16.0.196",
                    "172.16.0.197",
                    "172.16.0.198",
                    "172.16.0.199",
                    "172.16.0.200",
                    "172.16.0.201",
                    "172.16.0.202",
                    "172.16.0.203",
                    "172.16.0.204",
                    "172.16.0.205",
                    "172.16.0.206",
                    "172.16.0.207",
                    "172.16.0.208",
                    "172.16.0.209",
                    "172.16.0.210",
                    "172.16.0.211",
                    "172.16.0.212",
                    "172.16.0.213",
                    "172.16.0.214",
                    "172.16.0.215",
                    "172.16.0.216",
                    "172.16.0.217",
                    "172.16.0.218",
                    "172.16.0.219",
                    "172.16.0.220",
                    "172.16.0.221",
                    "172.16.0.222",
                    "172.16.0.223",
                    "172.16.0.224",
                    "172.16.0.225",
                    "172.16.0.226",
                    "172.16.0.227",
                    "172.16.0.228",
                    "172.16.0.229",
                    "172.16.0.230",
                    "172.16.0.231",
                    "172.16.0.232",
                    "172.16.0.233",
                    "172.16.0.234",
                    "172.16.0.235",
                    "172.16.0.236",
                    "172.16.0.237",
                    "172.16.0.238",
                    "172.16.0.239",
                    "172.16.0.240",
                    "172.16.0.241",
                    "172.16.0.242",
                    "172.16.0.243",
                    "172.16.0.244",
                    "172.16.0.245",
                    "172.16.0.246",
                    "172.16.0.247",
                    "172.16.0.248",
                    "172.16.0.249",
                    "172.16.0.250",
                    "172.16.0.251",
                    "172.16.0.252",
                    "172.16.0.253",
                    "172.16.0.254"
                ]
            }
        ],
        "IL-JR": [
            {
                "name": "wan",
                "ips": "auto"
            },
            {
                "name": "lan-82933-foo-bar",
                "ips": [
                    "172.16.0.1",
                    "172.16.0.2",
                    "172.16.0.3",
                    "172.16.0.4",
                    "172.16.0.5",
                    "172.16.0.6",
                    "172.16.0.7",
                    "172.16.0.8",
                    "172.16.0.9",
                    "172.16.0.10",
                    "172.16.0.11",
                    "172.16.0.12",
                    "172.16.0.13",
                    "172.16.0.14",
                    "172.16.0.15",
                    "172.16.0.16",
                    "172.16.0.17",
                    "172.16.0.18",
                    "172.16.0.19",
                    "172.16.0.20",
                    "172.16.0.21",
                    "172.16.0.22",
                    "172.16.0.23",
                    "172.16.0.24",
                    "172.16.0.25",
                    "172.16.0.26",
                    "172.16.0.27",
                    "172.16.0.28",
                    "172.16.0.29",
                    "172.16.0.30",
                    "172.16.0.31",
                    "172.16.0.32",
                    "172.16.0.33",
                    "172.16.0.34",
                    "172.16.0.35",
                    "172.16.0.36",
                    "172.16.0.37",
                    "172.16.0.38",
                    "172.16.0.39",
                    "172.16.0.40",
                    "172.16.0.41",
                    "172.16.0.42",
                    "172.16.0.43",
                    "172.16.0.44",
                    "172.16.0.45",
                    "172.16.0.46",
                    "172.16.0.47",
                    "172.16.0.48",
                    "172.16.0.49",
                    "172.16.0.50",
                    "172.16.0.51",
                    "172.16.0.52",
                    "172.16.0.53",
                    "172.16.0.54",
                    "172.16.0.55",
                    "172.16.0.56",
                    "172.16.0.57",
                    "172.16.0.58",
                    "172.16.0.59",
                    "172.16.0.60",
                    "172.16.0.61",
                    "172.16.0.62",
                    "172.16.0.63",
                    "172.16.0.64",
                    "172.16.0.65",
                    "172.16.0.66",
                    "172.16.0.67",
                    "172.16.0.68",
                    "172.16.0.69",
                    "172.16.0.70",
                    "172.16.0.71",
                    "172.16.0.72",
                    "172.16.0.73",
                    "172.16.0.74",
                    "172.16.0.75",
                    "172.16.0.76",
                    "172.16.0.77",
                    "172.16.0.78",
                    "172.16.0.79",
                    "172.16.0.80",
                    "172.16.0.81",
                    "172.16.0.82",
                    "172.16.0.83",
                    "172.16.0.84",
                    "172.16.0.85",
                    "172.16.0.86",
                    "172.16.0.87",
                    "172.16.0.88",
                    "172.16.0.89",
                    "172.16.0.90",
                    "172.16.0.91",
                    "172.16.0.92",
                    "172.16.0.93",
                    "172.16.0.94",
                    "172.16.0.95",
                    "172.16.0.96",
                    "172.16.0.97",
                    "172.16.0.98",
                    "172.16.0.99",
                    "172.16.0.100",
                    "172.16.0.101",
                    "172.16.0.102",
                    "172.16.0.103",
                    "172.16.0.104",
                    "172.16.0.105",
                    "172.16.0.106",
                    "172.16.0.107",
                    "172.16.0.108",
                    "172.16.0.109",
                    "172.16.0.110",
                    "172.16.0.111",
                    "172.16.0.112",
                    "172.16.0.113",
                    "172.16.0.114",
                    "172.16.0.115",
                    "172.16.0.116",
                    "172.16.0.117",
                    "172.16.0.118",
                    "172.16.0.119",
                    "172.16.0.120",
                    "172.16.0.121",
                    "172.16.0.122",
                    "172.16.0.123",
                    "172.16.0.124",
                    "172.16.0.125",
                    "172.16.0.126",
                    "172.16.0.127",
                    "172.16.0.128",
                    "172.16.0.129",
                    "172.16.0.130",
                    "172.16.0.131",
                    "172.16.0.132",
                    "172.16.0.133",
                    "172.16.0.134",
                    "172.16.0.135",
                    "172.16.0.136",
                    "172.16.0.137",
                    "172.16.0.138",
                    "172.16.0.139",
                    "172.16.0.140",
                    "172.16.0.141",
                    "172.16.0.142",
                    "172.16.0.143",
                    "172.16.0.144",
                    "172.16.0.145",
                    "172.16.0.146",
                    "172.16.0.147",
                    "172.16.0.148",
                    "172.16.0.149",
                    "172.16.0.150",
                    "172.16.0.151",
                    "172.16.0.152",
                    "172.16.0.153",
                    "172.16.0.154",
                    "172.16.0.155",
                    "172.16.0.156",
                    "172.16.0.157",
                    "172.16.0.158",
                    "172.16.0.159",
                    "172.16.0.160",
                    "172.16.0.161",
                    "172.16.0.162",
                    "172.16.0.163",
                    "172.16.0.164",
                    "172.16.0.165",
                    "172.16.0.166",
                    "172.16.0.167",
                    "172.16.0.168",
                    "172.16.0.169",
                    "172.16.0.170",
                    "172.16.0.171",
                    "172.16.0.172",
                    "172.16.0.173",
                    "172.16.0.174",
                    "172.16.0.175",
                    "172.16.0.176",
                    "172.16.0.177",
                    "172.16.0.178",
                    "172.16.0.179",
                    "172.16.0.180",
                    "172.16.0.181",
                    "172.16.0.182",
                    "172.16.0.183",
                    "172.16.0.184",
                    "172.16.0.185",
                    "172.16.0.186",
                    "172.16.0.187",
                    "172.16.0.188",
                    "172.16.0.189",
                    "172.16.0.190",
                    "172.16.0.191",
                    "172.16.0.192",
                    "172.16.0.193",
                    "172.16.0.194",
                    "172.16.0.195",
                    "172.16.0.196",
                    "172.16.0.197",
                    "172.16.0.198",
                    "172.16.0.199",
                    "172.16.0.200",
                    "172.16.0.201",
                    "172.16.0.202",
                    "172.16.0.203",
                    "172.16.0.204",
                    "172.16.0.205",
                    "172.16.0.206",
                    "172.16.0.207",
                    "172.16.0.208",
                    "172.16.0.209",
                    "172.16.0.210",
                    "172.16.0.211",
                    "172.16.0.212",
                    "172.16.0.213",
                    "172.16.0.214",
                    "172.16.0.215",
                    "172.16.0.216",
                    "172.16.0.217",
                    "172.16.0.218",
                    "172.16.0.219",
                    "172.16.0.220",
                    "172.16.0.221",
                    "172.16.0.222",
                    "172.16.0.223",
                    "172.16.0.224",
                    "172.16.0.225",
                    "172.16.0.226",
                    "172.16.0.227",
                    "172.16.0.228",
                    "172.16.0.229",
                    "172.16.0.230",
                    "172.16.0.231",
                    "172.16.0.232",
                    "172.16.0.233",
                    "172.16.0.234",
                    "172.16.0.235",
                    "172.16.0.236",
                    "172.16.0.237",
                    "172.16.0.238",
                    "172.16.0.239",
                    "172.16.0.240",
                    "172.16.0.241",
                    "172.16.0.242",
                    "172.16.0.243",
                    "172.16.0.244",
                    "172.16.0.245",
                    "172.16.0.246",
                    "172.16.0.247",
                    "172.16.0.248",
                    "172.16.0.249",
                    "172.16.0.250",
                    "172.16.0.251",
                    "172.16.0.252",
                    "172.16.0.253",
                    "172.16.0.254",
                    "172.16.0.255",
                    "172.16.1.0",
                    "172.16.1.1",
                    "172.16.1.2",
                    "172.16.1.3",
                    "172.16.1.4",
                    "172.16.1.5",
                    "172.16.1.6",
                    "172.16.1.7",
                    "172.16.1.8",
                    "172.16.1.9",
                    "172.16.1.10",
                    "172.16.1.11",
                    "172.16.1.12",
                    "172.16.1.13",
                    "172.16.1.14",
                    "172.16.1.15",
                    "172.16.1.16",
                    "172.16.1.17",
                    "172.16.1.18",
                    "172.16.1.19",
                    "172.16.1.20",
                    "172.16.1.21",
                    "172.16.1.22",
                    "172.16.1.23",
                    "172.16.1.24",
                    "172.16.1.25",
                    "172.16.1.26",
                    "172.16.1.27",
                    "172.16.1.28",
                    "172.16.1.29",
                    "172.16.1.30",
                    "172.16.1.31",
                    "172.16.1.32",
                    "172.16.1.33",
                    "172.16.1.34",
                    "172.16.1.35",
                    "172.16.1.36",
                    "172.16.1.37",
                    "172.16.1.38",
                    "172.16.1.39",
                    "172.16.1.40",
                    "172.16.1.41",
                    "172.16.1.42",
                    "172.16.1.43",
                    "172.16.1.44",
                    "172.16.1.45",
                    "172.16.1.46",
                    "172.16.1.47",
                    "172.16.1.48",
                    "172.16.1.49",
                    "172.16.1.50",
                    "172.16.1.51",
                    "172.16.1.52",
                    "172.16.1.53",
                    "172.16.1.54",
                    "172.16.1.55",
                    "172.16.1.56",
                    "172.16.1.57",
                    "172.16.1.58",
                    "172.16.1.59",
                    "172.16.1.60",
                    "172.16.1.61",
                    "172.16.1.62",
                    "172.16.1.63",
                    "172.16.1.64",
                    "172.16.1.65",
                    "172.16.1.66",
                    "172.16.1.67",
                    "172.16.1.68",
                    "172.16.1.69",
                    "172.16.1.70",
                    "172.16.1.71",
                    "172.16.1.72",
                    "172.16.1.73",
                    "172.16.1.74",
                    "172.16.1.75",
                    "172.16.1.76",
                    "172.16.1.77",
                    "172.16.1.78",
                    "172.16.1.79",
                    "172.16.1.80",
                    "172.16.1.81",
                    "172.16.1.82",
                    "172.16.1.83",
                    "172.16.1.84",
                    "172.16.1.85",
                    "172.16.1.86",
                    "172.16.1.87",
                    "172.16.1.88",
                    "172.16.1.89",
                    "172.16.1.90",
                    "172.16.1.91",
                    "172.16.1.92",
                    "172.16.1.93",
                    "172.16.1.94",
                    "172.16.1.95",
                    "172.16.1.96",
                    "172.16.1.97",
                    "172.16.1.98",
                    "172.16.1.99",
                    "172.16.1.100",
                    "172.16.1.101",
                    "172.16.1.102",
                    "172.16.1.103",
                    "172.16.1.104",
                    "172.16.1.105",
                    "172.16.1.106",
                    "172.16.1.107",
                    "172.16.1.108",
                    "172.16.1.109",
                    "172.16.1.110",
                    "172.16.1.111",
                    "172.16.1.112",
                    "172.16.1.113",
                    "172.16.1.114",
                    "172.16.1.115",
                    "172.16.1.116",
                    "172.16.1.117",
                    "172.16.1.118",
                    "172.16.1.119",
                    "172.16.1.120",
                    "172.16.1.121",
                    "172.16.1.122",
                    "172.16.1.123",
                    "172.16.1.124",
                    "172.16.1.125",
                    "172.16.1.126",
                    "172.16.1.127",
                    "172.16.1.128",
                    "172.16.1.129",
                    "172.16.1.130",
                    "172.16.1.131",
                    "172.16.1.132",
                    "172.16.1.133",
                    "172.16.1.134",
                    "172.16.1.135",
                    "172.16.1.136",
                    "172.16.1.137",
                    "172.16.1.138",
                    "172.16.1.139",
                    "172.16.1.140",
                    "172.16.1.141",
                    "172.16.1.142",
                    "172.16.1.143",
                    "172.16.1.144",
                    "172.16.1.145",
                    "172.16.1.146",
                    "172.16.1.147",
                    "172.16.1.148",
                    "172.16.1.149",
                    "172.16.1.150",
                    "172.16.1.151",
                    "172.16.1.152",
                    "172.16.1.153",
                    "172.16.1.154",
                    "172.16.1.155",
                    "172.16.1.156",
                    "172.16.1.157",
                    "172.16.1.158",
                    "172.16.1.159",
                    "172.16.1.160",
                    "172.16.1.161",
                    "172.16.1.162",
                    "172.16.1.163",
                    "172.16.1.164",
                    "172.16.1.165",
                    "172.16.1.166",
                    "172.16.1.167",
                    "172.16.1.168",
                    "172.16.1.169",
                    "172.16.1.170",
                    "172.16.1.171",
                    "172.16.1.172",
                    "172.16.1.173",
                    "172.16.1.174",
                    "172.16.1.175",
                    "172.16.1.176",
                    "172.16.1.177",
                    "172.16.1.178",
                    "172.16.1.179",
                    "172.16.1.180",
                    "172.16.1.181",
                    "172.16.1.182",
                    "172.16.1.183",
                    "172.16.1.184",
                    "172.16.1.185",
                    "172.16.1.186",
                    "172.16.1.187",
                    "172.16.1.188",
                    "172.16.1.189",
                    "172.16.1.190",
                    "172.16.1.191",
                    "172.16.1.192",
                    "172.16.1.193",
                    "172.16.1.194",
                    "172.16.1.195",
                    "172.16.1.196",
                    "172.16.1.197",
                    "172.16.1.198",
                    "172.16.1.199",
                    "172.16.1.200",
                    "172.16.1.201",
                    "172.16.1.202",
                    "172.16.1.203",
                    "172.16.1.204",
                    "172.16.1.205",
                    "172.16.1.206",
                    "172.16.1.207",
                    "172.16.1.208",
                    "172.16.1.209",
                    "172.16.1.210",
                    "172.16.1.211",
                    "172.16.1.212",
                    "172.16.1.213",
                    "172.16.1.214",
                    "172.16.1.215",
                    "172.16.1.216",
                    "172.16.1.217",
                    "172.16.1.218",
                    "172.16.1.219",
                    "172.16.1.220",
                    "172.16.1.221",
                    "172.16.1.222",
                    "172.16.1.223",
                    "172.16.1.224",
                    "172.16.1.225",
                    "172.16.1.226",
                    "172.16.1.227",
                    "172.16.1.228",
                    "172.16.1.229",
                    "172.16.1.230",
                    "172.16.1.231",
                    "172.16.1.232",
                    "172.16.1.233",
                    "172.16.1.234",
                    "172.16.1.235",
                    "172.16.1.236",
                    "172.16.1.237",
                    "172.16.1.238",
                    "172.16.1.239",
                    "172.16.1.240",
                    "172.16.1.241",
                    "172.16.1.242",
                    "172.16.1.243",
                    "172.16.1.244",
                    "172.16.1.245",
                    "172.16.1.246",
                    "172.16.1.247",
                    "172.16.1.248",
                    "172.16.1.249",
                    "172.16.1.250",
                    "172.16.1.251",
                    "172.16.1.252",
                    "172.16.1.253",
                    "172.16.1.254"
                ]
            }
        ],
        "IL-PT": [
            {
                "name": "wan",
                "ips": "auto"
            }
        ],
        "IL-RH": [
            {
                "name": "wan",
                "ips": "auto"
            }
        ],
        "IL-TA": [
            {
                "name": "wan",
                "ips": "auto"
            }
        ],
        "US-NY2": [
            {
                "name": "wan",
                "ips": "auto"
            }
        ],
        "US-SC": [
            {
                "name": "wan",
                "ips": "auto"
            }
        ],
        "US-TX": [
            {
                "name": "wan",
                "ips": "auto"
            }
        ]
    },
    "billing": [
        "monthly",
        "hourly"
    ]
}';
