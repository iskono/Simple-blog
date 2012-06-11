#!/bin/bash

rsync --delete --exclude="update-server.sh"  --exclude=".git" ./ /var/www/ -av
