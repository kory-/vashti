#!/bin/sh

echo "Running 'php artisan queue:listen --memory=512'"
php $HOME/site/artisan queue:listen
