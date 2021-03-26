#!/bin/bash

cd /var/www/html && nohup laravel-echo-server start & disown
cd /var/www/html && nohup php artisan datagamble:subscribe & disown

