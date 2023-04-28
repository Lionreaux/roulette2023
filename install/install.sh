#!/bin/bash

sudo apt update
sudo apt upgrade 

#Git
sudo apt install git

#php
sudo apt install -y php8.1

#SQL
sudo apt install -y mariadb-server

#apache2
sudo apt install -y apache2
sudo a2enmod rewrite
sudo a2enmod php8.1
sudo apt install -y libapache2-mod-php8.1 php-mysql
sudo systemctl restart apache2

cd /var/www || exit

git clone https://github.com/Lionreaux/roulette2023.git

#config mysql
sudo mysql < /var/www/roulette2023/Sql/script.sql

#config apache
sudo tee /etc/apache2/sites-enabled/000-default.conf > /dev/null <<EOF
<VirtualHost :80>
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
 </VirtualHost>
EOF



sudo systemctl restart apache2
