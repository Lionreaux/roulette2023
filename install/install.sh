#!/bin/bash

sudo apt update
sudo apt-get upgrade -y

#php
sudo apt-get install -y php8.1

#SQL
sudo apt-get install -y mariadb-server

#apache2
sudo apt install -y apache2
sudo a2enmod rewrite
sudo a2enmod php8.1
sudo apt-get install -y libapache2-mod-php8.1 php-mysql
sudo systemctl restart apache2

#config mysql
sudo mysql < ./Sql/script.sql

#config apache
sudo echo "<VirtualHost :80>
    ServerName localhost
    DocumentRoot /var/www/roulette2023
    <Directory /var/www/roulette2023/>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    RewriteEngine on
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.)$ /Controlleur/index.php?path=$1 [NC,L,QSA]
 </VirtualHost>" > /etc/apache2/site-enabled/000-default.conf


sudo systemctl restart apache2
