#!/bin/bash
#
# Please, run this script as root (or using "sudo").
#

echo 'Installing Xero-AddOn dependencies...'
apt-get install php-cli php-mongodb php-xml php-curl php-mbstring openssl

echo 'Installing Xero-UI dependencies...'
curl -sL https://deb.nodesource.com/setup_10.x | bash -
apt-get install -y nodejs

echo 'Done! Now, just install npm packages inside xero-ui folder.'
