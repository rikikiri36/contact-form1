# お問い合わせフォーム

## 環境構築

### Dockerビルド
1. git clone https://github.com/rikikiri36/contact-form1
2. docker compose up -d --build

### Laravel環境構築
1. composer install
2. cp .env.example .env
3. コピー後、.envの下記環境変数を変更
    - DB_HOST=mysql
    - DB_DATABASE=laravel_db
    - DB_USERNAME=laravel_user
    - DB_PASSWORD=laravel_pass
4. php artisan key:generate
5. php artisan migrate:fresh
6. php artisan db:seed

## 使用技術

- PHP 8.4.1
- Laravel Framework 8.83.29
- MySQL 8.0.41
- Docker 27.5.1

## URL

1. 開発環境
   http://localhost/
2. phpMyAdmin
   http://localhost:8080/
