#!/bin/bash

php artisan mig:ref --seed
php artisan storage:link
