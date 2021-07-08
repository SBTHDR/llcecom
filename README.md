# LLCeCom eCommerce system

## About Repository

LLCeCom is an ecommerce system based on Laravel 8.
Frontend system provide a simple online interface to order products from online.
Backend system provide management of the ecommerce system.

## Tech Specification

- Laravel 8
- jQuery 3
- Bootstrap 5
- Font Awesome 5
- Intervention Image

## Features

- Complete ecommerce system
- Login, Register, using default auth
- Show, update, edit, and delete products as admin
- product checkout
- user dashboard
- Authorization

## Installation

- `git clone https://github.com/SBTHDR/llcecom.git`
- `cd llcecom/`
- `cp .env.example .env`
- `composer install`
- Run `php artisan key:generate`
- Update `.env` and set your database credentials
- `php artisan migrate --seed`
- `npm install`
- `npm run dev`
- `php artisan serve`

## License

[MIT license](https://opensource.org/licenses/MIT).
