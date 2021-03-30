## php-server-support

The config library supports programmer as well as handling problems while working with PHP language

## Installation

Require this package with composer. It is recommended to only require the package.

```shell
composer require linhnh95/php-sever-support
```

### Config

####I. Laravel, Lumen
Write the following line of code in the `register` or `boot` function in `app/Providers/AppServiceProvider.php`


####II. Other
Write in `index.php`

```php
new SupportProvider();
```