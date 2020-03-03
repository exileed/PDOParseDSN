# PDOParseDSN

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


Library to parse a PDO DSN string.


## Install

Via Composer

``` bash
$ composer require exileed/pdoparsedsn
```

## Usage

``` php
$dsn = new \ExileeD\PDOParseDSN\DSN('mysql:host=127.0.0.1;port=3306;dbname=test_db');

$dsn->getProtocol(); // mysql
$dsn->getHost(); // 127.0.0.1
$dsn->getPort(); // 3306
$dsn->getDatabase(); // test_db

```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email me@exileed.com instead of using the issue tracker.

## Credits

- [Dmitriy Kuts][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/exileed/pdoparsedsn.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/exileed/pdoparsedsn/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/exileed/pdoparsedsn.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/exileed/pdoparsedsn.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/exileed/pdoparsedsn.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/exileed/pdoparsedsn
[link-travis]: https://travis-ci.org/exileed/pdoparsedsn
[link-scrutinizer]: https://scrutinizer-ci.com/g/exileed/pdoparsedsn/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/exileed/pdoparsedsn
[link-downloads]: https://packagist.org/packages/exileed/pdoparsedsn
[link-author]: https://github.com/exileed
[link-contributors]: ../../contributors
