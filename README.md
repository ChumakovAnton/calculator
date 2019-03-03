# Calculator

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Calculator string expression.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practices by being named the following.

```
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require chumakovanton/calculator
```

## Usage

Sample usage

``` php
$calculator = new ChumakovAnton\Calculator\ExpressionCalculator();
echo $calculator->process('4+5*2-5+6/3');
```

For change implementation you need to implement ChumakovAnton\Calculator\Calculator interface

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email antosha.chumakov@gmail.com instead of using the issue tracker.

## Credits

- [Chumakov Anton][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/chumakovanton/calculator.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ChumakovAnton/Calculator/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/chumakovanton/calculator.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/chumakovanton/calculator.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/chumakovanton/calculator.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/chumakovanton/calculator
[link-travis]: https://travis-ci.org/ChumakovAnton/Calculator
[link-scrutinizer]: https://scrutinizer-ci.com/g/chumakovanton/calculator/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/chumakovanton/calculator
[link-downloads]: https://packagist.org/packages/chumakovanton/calculator
[link-author]: https://github.com/ChumakovAnton
[link-contributors]: ../../contributors
