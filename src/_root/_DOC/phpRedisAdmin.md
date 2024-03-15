#### Для установки phpRedisAdmin выполните следующие шаги:

Скачайте последнюю версию phpRedisAdmin и установите путь в /var/www/phpRedisAdmin:
```sh
git clone https://github.com/ErikDubbelboer/phpRedisAdmin.git
```

перейдите в папку redis: 
```sh
cd var/www/phpRedisAdmin
```

Установите Зависимости:
```sh
git clone https://github.com/nrk/predis.git vendor
```

Создайте новый файл конфигурации для phpRedisAdmin в директории sites-available Nginx:
```sh
sudo nano /etc/nginx/sites-available/phpredisadmin
```

Добавьте следующий конфигурационный блок:
```sh
# config for phpredisadmin
server {
  listen 70;
  server_name localhost;
  
  root /var/www/phpRedisAdmin;

  index index.php index.html index.htm; 
  
  location / {
   try_files $uri $uri/ index.php? $query_string;
  }

  location ~ \.php$ {
   include snippets/fastcgi-php.conf; 
   fastcgi_pass unix:/run/php/php8.2-fpm.sock;
  }

  location ~ /\.ht {
    deny all; 
  } 
}
```

Сохраните и закройте файл.

Создайте символьную ссылку для этого файла в директории sites-enabled:
```sh
sudo ln -s /etc/nginx/sites-available/phpredisadmin /etc/nginx/sites-enabled/
```

Перезапустите Nginx, чтобы изменения вступили в силу:
```sh
sudo systemctl restart nginx
```