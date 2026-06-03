<p align="center">
    <a href="https://croct.com">
        <img src="https://cdn.croct.io/brand/logo/repo-icon-green.svg" alt="Croct" height="80"/>
    </a>
    <br />
    <strong>PHP Coding Standard</strong>
    <br />
    A set of <a href="https://github.com/squizlabs/PHP_CodeSniffer">Code Sniffer</a> rules applied to all Croct PHP projects.
</p>
<p align="center">
    <img alt="Language" src="https://img.shields.io/badge/language-PHP-blue" />
    <a href="https://github.com/croct-tech/coding-standard-php/actions/workflows/validate-branch.yaml"><img alt="Build" src="https://github.com/croct-tech/coding-standard-php/actions/workflows/validate-branch.yaml/badge.svg" /></a>
    <img alt="License" src="https://img.shields.io/badge/license-MIT-blue" />
    <br />
    <br />
    <a href="https://github.com/croct-tech/coding-standard-php/releases">📦 Releases</a>
    ·
    <a href="https://github.com/croct-tech/coding-standard-php/issues">🐞 Report Bug</a>
    ·
    <a href="https://github.com/croct-tech/coding-standard-php/issues">✨ Request Feature</a>
</p>

## Installation

We recommend using the package manager [Composer](https://getcomposer.org) to install the package:

```sh
composer require croct/coding-standard
```

## Basic usage

Run the following command to check if the project adheres to the coding standard:

```sh
./vendor/bin/phpcs
```

## Contributing

Contributions to the package are always welcome! 

- Report any bugs or issues on the [issue tracker](https://github.com/croct-tech/coding-standard-php/issues).
- For major changes, please [open an issue](https://github.com/croct-tech/coding-standard-php/issues) first to discuss what you would like to change.
- Please make sure to update tests as appropriate.

## Testing

Before running the test suites, the development dependencies must be installed:

```sh
composer install
```

Then, to run all tests:

```sh
composer test
```

## License

This library is licensed under the [MIT license](LICENSE).
