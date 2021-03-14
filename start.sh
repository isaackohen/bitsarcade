#!/bin/bash

php artisan queue:clear
nohup laravel-echo-server start & disown
nohup php artisan datagamble:subscribe & disown

