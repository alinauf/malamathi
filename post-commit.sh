#!/bin/bash
# This script is called by the post-commit hook
# It will update the working copy on the server
# and then call the build script to build the site
# and copy it to the web root

composer install --optimize-autoloader

# Change the owner to "dev"
sudo chown -R dev:dev .

# Directories should have 755 permissions
find . -type d -exec chmod 755 {} \;

# Files should have 644 permissions
find . -type f -exec chmod 644 {} \;

# Give write permission to the storage and cache directories as needed
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Restrict permissions for sensitive files
chmod 600 .env

# Clear the cache
php artisan optimize:clear

# bun the build script
bun run build



