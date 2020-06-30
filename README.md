<p align="center">
    <a href="https://croct.com">
        <img src="https://cdn.croct.io/brand/logo/repo-icon-green.svg" alt=“Croct” height=“80”/>
    </a>
    <br />
    <strong>PHP Coding Standard</strong>
    <br />
    A set of <a href="https://github.com/squizlabs/PHP_CodeSniffer">Code Sniffer</a> rules applied to all Croct PHP projects.
</p>
<p align="center">
    <img alt="Language" src="https://img.shields.io/badge/language-PHP-blue" />
    <img alt="Build" src="https://github.com/croct-tech/coding-standard-php/workflows/Validations/badge.svg" />
    <a href="https://codeclimate.com/repos/5eac65a1a17f91739f001f38/maintainability"><img alt="Maintainability" src="https://api.codeclimate.com/v1/badges/e4354f125f9d9201a69d/maintainability" /></a>
    <a href="https://codeclimate.com/repos/5eac65a1a17f91739f001f38/test_coverage"><img alt="Coverage" src="https://api.codeclimate.com/v1/badges/e4354f125f9d9201a69d/test_coverage" /></a>
    <img alt="License" src="https://img.shields.io/badge/license-proprietary-lightgrey" />
    <br />
    <br />
    <a href="https://github.com/croct-tech/project-php/releases">📦 Releases</a>
    ·
    <a href="https://github.com/croct-tech/project-php/issues">🐞 Report Bug</a>
    ·
    <a href="https://github.com/croct-tech/project-php/issues">✨ Request Feature</a>
</p>

## Installation
Use the package manage [Composer](https://getcomposer.org) to install the package:

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

## Copyright Notice
Copyright © 2015-2020 Croct Limited, All Rights Reserved.

All information contained herein is, and remains the property of Croct Limited. The intellectual, design and technical concepts contained herein are proprietary to Croct Limited s and may be covered by U.S. and Foreign Patents, patents in process, and are protected by trade secret or copyright law. Dissemination of this information or reproduction of this material is strictly forbidden unless prior written permission is obtained from Croct Limited.
