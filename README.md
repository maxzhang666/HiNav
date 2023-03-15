# HiNav

> 嗨，导航

## 安装

```shell
composer update

cp .env.example .evn

php artisan key:generate --ansi

# php artisan admin:install

php artisan migrate

php artisan db:seed
```

## 组件工具

### dcat-admin

### ide-helper

- `php artisan ide-helper:generate` - [PHPDoc generation for Laravel Facades ](#automatic-phpdoc-generation-for-laravel-facades)
- `php artisan ide-helper:models` - [PHPDocs for models](#automatic-PHPDocs-for-models)
- `php artisan ide-helper:meta` - [PhpStorm Meta file](#phpstorm-meta-for-container-instances)
