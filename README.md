# Calculator

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

**Note:** Replace ```Chumakov Anton``` ```ChumakovAnton``` ```https://github.com/ChumakovAnton``` ```antosha.chumakov@gmail.com``` ```ChumakovAnton``` ```Calculator``` ```Calculator string expression``` with their correct values in [README.md](README.md), [CHANGELOG.md](CHANGELOG.md), [CONTRIBUTING.md](CONTRIBUTING.md), [LICENSE.md](LICENSE.md) and [composer.json](composer.json) files, then delete this line. You can run `$ php prefill.php` in the command line to make all replacements at once. Delete the file prefill.php as well.

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practices by being named the following.

```
bin/        
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require ChumakovAnton/Calculator
```

## Usage

``` php
$calculator = new ChumakovAnton\Calculator\Calculator();
echo $calculator->execute('4+5*2-5+6/3');
```

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

[ico-version]: https://img.shields.io/packagist/v/ChumakovAnton/Calculator.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ChumakovAnton/Calculator/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/ChumakovAnton/Calculator.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/ChumakovAnton/Calculator.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ChumakovAnton/Calculator.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/ChumakovAnton/Calculator
[link-travis]: https://travis-ci.org/ChumakovAnton/Calculator
[link-scrutinizer]: https://scrutinizer-ci.com/g/ChumakovAnton/Calculator/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/ChumakovAnton/Calculator
[link-downloads]: https://packagist.org/packages/ChumakovAnton/Calculator
[link-author]: https://github.com/ChumakovAnton
[link-contributors]: ../../contributors
