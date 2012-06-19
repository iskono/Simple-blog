#!/bin/bash

rsync --delete --exclude="update-server.sh" --exclude=".*"  --exclude=".git" ./ /var/www/ -av
chromium-browser "localhost/setup.php"
