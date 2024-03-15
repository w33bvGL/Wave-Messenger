#### Для установки phpMyAdmin выполните следующие шаги:

Установите phpMyAdmin и необходимые зависимости:
```sh
sudo apt update
sudo apt install phpmyadmin php-mbstring 
```

Выберите веб-сервер, который будет автоматически настроен для запуска phpMyAdmin. После выбора apache2 отключите веб-сервер Apache:
```sh
sudo systemctl stop apache2
```

Создайте новый файл конфигурации для phpMyAdmin в директории sites-available Nginx:
```sh
sudo nano /etc/nginx/sites-available/phpmyadmin
```

Добавьте следующий конфигурационный блок:
```sh
# config for phpMyAdmin
server {
  listen 90;
  server_name localhost;
  
  root /usr/share/phpmyadmin;

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
sudo ln -s /etc/nginx/sites-available/phpmyadmin /etc/nginx/sites-enabled/
```

Перезапустите Nginx, чтобы изменения вступили в силу:
```sh
sudo systemctl restart nginx
```

Добавьте пароль в MySQL и phpMyAdmin:
```sh
sudo mysql
```

```sh
SET PASSWORD FOR 'root'@'localhost' = PASSWORD('ваш пароль тут'); FLUSH PRIVILEGES;
```