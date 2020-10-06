## :rocket: Si-sewa

[![GitHub issues](https://img.shields.io/github/issues/hiskiapp/sisewa)](https://github.com/hiskiapp/sisewa/issues)
[![GitHub forks](https://img.shields.io/github/forks/hiskiapp/sisewa)](https://github.com/hiskiapp/sisewa/network)
[![GitHub stars](https://img.shields.io/github/stars/hiskiapp/sisewa)](https://github.com/hiskiapp/sisewa/stargazers)
[![GitHub license](https://img.shields.io/github/license/hiskiapp/sisewa)](https://github.com/hiskiapp/sisewa)

## WHAT IS SI-SEWA?

Gw ga tau

## System Requirement

-   PHP Version 7.4 or Above
-   Composer
-   Git
-   NPM

## Installation

1. Open the terminal, navigate to your directory (htdocs or public_html).

```bash
git clone https://github.com/hiskiapp/sisewa.git
cd sisewa
composer install
```

2. Run NPM

```
npm install && npm run dev
```


3. Setting the database configuration, open .env file at project root directory

```
DB_DATABASE=**your_db_name**
DB_USERNAME=**your_db_user**
DB_PASSWORD=**password**
```

4. Install Project

```bash
php artisan install
```

You will get the administrator credential and url access like example bellow:

```bash
::Administrator Credential::
URL Login: http://localhost:8000/admin/login
Email: admin@admin.com
Password: 123456

```
