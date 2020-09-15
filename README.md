## Easy Agency test project <p align="center"><img src="https://laravel.com/img/logomark.min.svg"></p>

REQUIREMENTS
------------
- PHP 7.3
- MySQL 5.7 or higher
- composer 1.10.8
- Node.js v13.10.1
- npm 6.14.5

### Deploying

- Execute next commands in project root:

Generate key:
~~~
php artisan key:generate
~~~

Inid database:
~~~
php artisan migrate --seed
~~~

Install node dependencies:
~~~
npm install
~~~

Compile assets:
~~~
npm run prod
~~~

- You may login as a next users:

As admin user:
~~~
username: adminuser@mail.com
password: Temp1234#
~~~

Or as regular user:
~~~
username: regularuser@mail.com
password: Temp123#
~~~

Or register your own.