# Настройка окружения для проекта

#### Данная инструкция предназначена для установки необходимых компонентов и настройки окружения для проекта на операционных системах Linux Debian 12

#### будем исползовать

<div align="left">
<img src="https://github.com/devicons/devicon/blob/master/icons/html5/html5-original.svg" title="HTML5" alt="HTML" width="40" height="40"/>&nbsp;
<img src="https://github.com/devicons/devicon/blob/master/icons/css3/css3-original.svg"  title="CSS3" alt="CSS" width="40" height="40"/>&nbsp;
<img src="https://github.com/devicons/devicon/blob/master/icons/php/php-original.svg" title="PHP" alt="PHP" width="40" height="40"/>
<img src="https://github.com/devicons/devicon/blob/master/icons/composer/composer-original.svg" title="composer" alt="composer" width="40" height="40"/>
<img src="https://github.com/devicons/devicon/blob/master/icons/python/python-original.svg" title="Python" alt="Python" width="40" height="40"/>
<img src="https://github.com/devicons/devicon/blob/master/icons/mysql/mysql-original.svg" title="MySQL" alt="MySQL" width="40" height="40"/>
<img src="https://github.com/devicons/devicon/blob/master/icons/redis/redis-original.svg" title="Redis" alt="Redis" width="40" height="40"/>
<img src="https://github.com/devicons/devicon/blob/master/icons/mongodb/mongodb-original.svg" title="MongoDb" alt="MongoDb" width="40" height="40"/>
</div>

### 1. Обновление пакетов

Перед началом установки убедитесь, что ваша система обновлена до последней версии:

```sh
sudo apt update
sudo apt upgrade
```

### 2. Установка Visual Studio Code

Visual Studio Code - это мощный редактор кода с поддержкой множества языков программирования. Следующие команды установят его на вашу систему:

```sh
sudo apt install curl
sudo curl https://packages.microsoft.com/keys/microsoft.asc | gpg --dearmor > microsoft.gpg
sudo mv microsoft.gpg /etc/apt/trusted.gpg.d/microsoft.gpg
sudo sh -c 'echo "deb [arch=amd64] https://packages.microsoft.com/repos/vscode stable main" > /etc/apt/sources.list.d/vscode.list'
sudo apt update
sudo apt install code
```

### 3. Установка Git

Git - это распределенная система управления версиями, которая позволяет контролировать изменения в исходном коде проекта. Выполните следующие команды для установки Git и настройки вашего имени пользователя и адреса электронной почты:

```sh
sudo apt update
sudo apt install git
```

```sh
git config --global user.name "Ваше имя"
git config --global user.email "ваша_электронная_почта@example.com"
```

### 4. Установка PHP

PHP - это основной язык программирования для проекта. Установите PHP и несколько расширений, необходимых для работы:

```sh
sudo apt update
sudo apt install php php-cli php-fpm php-mysql php-xml php-curl php-mbstring php-redis php-mongodb php-pear php-dev
```

Убедитесь, что у вас установлены Zend Engine и OPcache, выполнив команду:

```sh
php --version
```

также вы можите удалить php

```sh
sudo apt purge php*
```

```sh
PHP 8.2.7 (cli) (built: Jun  9 2023 19:37:27) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.2.7, Copyright (c) Zend Technologies
with Zend OPcache v8.2.7, Copyright (c), by Zend Technologies
```

#### Пакеты PHP, установленные выше:

- php-cli: Предоставляет командную строку для PHP.
- php-fpm: Менеджер процессов FastCGI для PHP.
- php-mysql: Поддержка MySQL для PHP.
- php-xml: Модуль PHP для работы с XML-данными.
- php-curl: Поддержка библиотеки cURL для PHP.
- php-mbstring: Многобайтные строки для PHP.
- php-redis: Поддержка расширения Redis для PHP.

### 5. Установка менеджера пакетов PHP Composer

Composer - это инструмент для управления зависимостями в PHP-проектах. Установите его, выполнив следующие команды:

```sh
sudo apt update
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

```sh
composer --version
```

### 6. Установка и настройка Nginx

Nginx - это веб-сервер, который будет обслуживать этот проект. Установите его, выполнив следующие команды:

```sh
sudo apt update
sudo apt install nginx
```

Убедитесь, что Nginx успешно запущен, проверив его статус:

```sh
sudo systemctl status nginx
```

Если у вас включен файрвол (например, UFW), убедитесь, что он разрешает трафик HTTP (порт 80)

```sh
sudo ufw allow 'Nginx HTTP'
```

#### Проверка порта 80 на занятость

Порт 80 может быть занят другим процессом, таким как Apache. Узнайте, какой процесс использует порт 80:

```sh
sudo netstat -tuln | grep 80 или sudo ss -tuln | grep ':80'
```

```sh
tcp LISTEN 0 511 *:80 *:*
```

```sh
sudo lsof -i :80
```

Если порт занят другим веб-сервером, остановите его перед запуском Nginx:

Отключаем другой веб сервер:

```sh
sudo systemctl stop apache2
```

Затем перезапустите Nginx:

```sh
sudo systemctl restart nginx
```

### 7. Создание нового конфигурационного файла для проекта

Создайте новый конфигурационный файл для вашего проекта:

```sh
sudo nano /etc/nginx/sites-available/default
```

Добавьте следующий конфигурационный блок:

```sh
# config for Wave-messenger
server {
   listen 80;
   server_name localhost;

   root /var/www/Wave-Messenger;
   index.php index.html index.htm;

   location / {
    try_files $url $url/ /index.php?$query_string;
   }

   location ~ \.php$ {
    include snippets/fastcgi-php.conf;
    fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
   }

   location ~ /\.ht {
    deny all;
   }
}
```

После этого удалите стандартную папку html:

```sh
sudo rm -rf /var/www/html
```

Замените путь до вашей папки проекта:

```sh
sudo mv /path/to/your/project /var/www/Wave-Messenger
```

Затем перезапустите Nginx:

```sh
sudo systemctl restart nginx
```

### 8. Установка и настройка MySQL

Установите пакет MySQL Server

```sh
sudo apt update
sudo apt install default-mysql-server
```

После установки MySQL Server он автоматически запустится. Вы можете проверить статус службы, выполнив:

```sh
sudo systemctl status mysql
```

Если служба не запустилась автоматически, вы можете запустить ее вручную с помощью команды:

```sh
sudo systemctl start mysql
```

Входим в MySQL:

```sh
sudo mysql
```

Добавьте пароль в MySQL:

```sh
SET PASSWORD FOR 'root'@'localhost' = PASSWORD('ваш пароль тут'); FLUSH PRIVILEGES;
```

Затем перезапустите Nginx:

```sh
sudo systemctl restart nginx
```

После успешного запуска MySQL вы можете войти в командную строку MySQL, используя следующую команду:

```sh
sudo mysql
```

Это откроет командную строку MySQL, где вы можете начать работу с базами данных и пользователями.

### 9. импорт базы данных mySql

Создайте базу данных:

```sh
CREATE DATABASE Wave_messenger CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

Дамп базы данных находится в src/\_root/wave_messenger.sql. Импортируйте дамп базы данных в базу данных Wave_messenger.
После импорта сделайте соединение с базой данных. В файле \_inc/connect.php:

```sh
$dbHost = 'localhost';
$dbName = 'Wave_messenger';
$dbUser = 'root';
$dbPass = 'root';
```

Смените на ваш URL адрес в этом случае :

```sh
$URL = 'localhost';
```

### 10. Установка и настройка Redis

Для установки Redis выполним следующие команды в терминале:

```sh
sudo apt update
sudo apt install redis-server
```

Запускайте Redis

```sh
sudo apt systemctl start redis
```

PHP для использования Redis для хранения сессий
Для этого нам понадобится настроить PHP для использования Redis в качестве хранилища сессий. Откроем файл настроек PHP php.ini:

```sh
sudo nano /etc/php/8.2/fpm/php.ini
```

Здесь мы указываем, что хотим использовать Redis для хранения сессий и указываем адрес Redis сервера (localhost) и порт (6379):

```sh
session.save_handler = redis
session.save_path = "tcp://localhost:6379"
```

Сохраните изменения и закройте файл.
Чтобы изменения вступили в силу, перезапустите службу PHP-FPM:

```sh
sudo systemctl restart php8.2-fpm
```

Загрузка phpredis: Сначала загрузите phpredis из репозитория GitHub. Вы можете сделать это, перейдя по ссылке https://github.com/phpredis/phpredis и нажав кнопку "Code" -> "Download ZIP". После загрузки архива распакуйте его в удобное место на вашем компьютере
Компиляция и установка: Перейдите в каталог, в который вы распаковали phpredis, и выполните следующие команды в терминале:

```sh
cd phpredis
sudo phpize
sudo ./configure
sudo make
sudo make install
```

### 11. Установка и настройка MongoDb

Из терминала установите gnupgи , curl если они еще не доступны:

```sh
sudo apt-get install gnupg curl
```

Чтобы импортировать общедоступный ключ GPG MongoDB, выполните следующую команду:

```sh
curl -fsSL https://www.mongodb.org/static/pgp/server-7.0.asc | \
 sudo gpg -o /usr/share/keyrings/mongodb-server-7.0.gpg \
 --dearmor
```

Создайте файл списка с помощью команды, соответствующей вашей версии Debian:

```sh
echo "deb [ signed-by=/usr/share/keyrings/mongodb-server-7.0.gpg ] http://repo.mongodb.org/apt/debian bookworm/mongodb-org/7.0 main" | sudo tee /etc/apt/sources.list.d/mongodb-org-7.0.list
```

Чтобы установить последнюю стабильную версию, выполните следующую команду:

```sh
sudo apt-get install -y mongodb-org
```

После установки MongoDB автоматически запустится. Вы можете проверить его статус с помощью команды:
Если MongoDB не запущен, вы можете запустить его с помощью команды:

```sh
sudo systemctl start mongod
```

### 12. Установка Python

В Debian по умолчанию часто устанавливается Python версии 3.x. Вы можете убедиться в наличии Python 3, выполнив следующую команду:

```sh
python3 --version
```

Если Python 3 уже установлен, вы увидите его версию. Если нет, вы можете установить его из официальных репозиториев Debian с помощью следующей команды:

```sh
sudo apt update
sudo apt install python3
```

После установки Python 3 вы можете установить Flask с помощью менеджера пакетов Python pip. Убедитесь, что pip установлен:

```sh
sudo apt install python3-pip
```

Чтобы проверить, что Python и Flask успешно установлены, выполните следующие команды:

```sh
python3 --version
```

Перейдите в каталог /var/www/Wave-Messenger:

```sh
cd /var/www/Wave-Messenger
```

Создайте виртуальное окружение в этом каталоге. Вы можете назвать его, например, env

```sh
python3 -m venv env
```

Активируйте виртуальное окружение.

```sh
source env/bin/activate
```

#### Установим все библатеки и зависимости которые будем исползовать:

```sh
pip install Flask
```

```sh
sudo apt-get install libmariadb-dev-compat
sudo apt-get install libmariadb-dev
```

```sh
pip install flask-mysqldb
```

```sh
pip install Flask-SocketIO
```
