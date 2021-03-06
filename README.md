# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# BOOK SERVICE

## Using JWT for API Authentication

## User Info Login in User Seeder
Username = admin\
Password = password\
is_admin = true\
<br>
Username = user1\
Password = password\
is_admin = false\
<br>
Username = user2\
Password = password\
is_admin = false<br>
<br>
## Book Routes
Path = book/create/ <br>
Method = POST<br>
Middleware = Auth, Admin<br>
Params = - title: required<br>
         - description: nullable<br>
<br>
Path = books/<br>
Method = GET<br>
Middleware = Auth<br>
<br>
## Book Collection Routes
Path = book/collections/<br>
Method = GET<br>
Middleware = Auth<br>
<br>
Path = book/collection/add/<br>
Method = POST<br>
Middleware = Auth<br>
Params = - book_id: required<br>
