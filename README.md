# Silverstripe Bootstrap Forms

[![🎭 Tests](https://github.com/syntro-opensource/silverstripe-bootstrap-forms/workflows/%F0%9F%8E%AD%20Tests/badge.svg)](https://github.com/syntro-opensource/silverstripe-bootstrap-forms/actions?query=workflow%3A%22%F0%9F%8E%AD+Tests%22+branch%3A%22master%22)
[![codecov](https://codecov.io/gh/syntro-opensource/silverstripe-bootstrap-forms/branch/master/graph/badge.svg)](https://codecov.io/gh/syntro-opensource/silverstripe-bootstrap-forms)
![Dependabot](https://img.shields.io/badge/dependabot-active-brightgreen?logo=dependabot)
[![phpstan](https://img.shields.io/badge/PHPStan-enabled-success)](https://github.com/phpstan/phpstan)
[![composer](https://img.shields.io/packagist/dt/syntro/silverstripe-bootstrap-forms?color=success&logo=composer)](https://packagist.org/packages/syntro/silverstripe-bootstrap-forms)
[![Packagist Version](https://img.shields.io/packagist/v/syntro/silverstripe-bootstrap-forms?label=stable&logo=composer)](https://packagist.org/packages/syntro/silverstripe-bootstrap-forms)

Silverstripe module for adding bootstrap forms to the frontend more easily.

## Introduction
Creating forms compatible with the [Bootstrap CSS framework](https://getbootstrap.com)
using the provided form fields by Silverstripe is not an easy thing to do.
Silverstripes' internally used form fields are not intended to be frontend
fields in the first place, meaning the framework is very opinionated about how
these fields are rendered in the admin UI and imposes these standards for frontend
fields. These standards however are not very compatible with Bootstrap, especially
Bootstrap v5.

To counter this, this module introduces a new set of fields, which behave like
the originals, but render in a bootstrap compatible way. They also add a separate
`holderClasses` attribute, which allows the easy formatting of forms using
spacing classes.

## Installation
To install this module, run the following command:
```
composer require syntro/silverstripe-bootstrap-forms
```

## Usage
### Quick Start
The following fields are available currently:
```php
use Syntro\SilverstripeBootstrapForms\Forms\CheckboxField;
use Syntro\SilverstripeBootstrapForms\Forms\CheckboxSetField;
use Syntro\SilverstripeBootstrapForms\Forms\DropdownField;
use Syntro\SilverstripeBootstrapForms\Forms\EmailField;
use Syntro\SilverstripeBootstrapForms\Forms\OptionsetField;
use Syntro\SilverstripeBootstrapForms\Forms\TextareaField;
use Syntro\SilverstripeBootstrapForms\Forms\TextField;

// does not have the HolderClass trait
use Syntro\SilverstripeBootstrapForms\Forms\FieldGroup;
```
All fields have an extra set of methods, analogous the `extraClass` ones:
* `holderClass()`
* `setupDefaultHolderClasses()`
* `hasHolderClass($class)`
* `addHolderClass($class)`
* `removeHolderClass($class)`

They behave the exact same way as their `xxxExtraClass` counterparts, but they
control the class on the outer (holder) div.

### Example
To create a good looking multi-column form, simply add the correct classes:
```php
FieldGroup::create(
    TextField::create('Name', 'Your Name')->addHolderClass('col'),
    EmailField::create('Email', 'Email')->addHolderClass('col'),
    DropdownField::create(
        'choose',
        'Choose an option',
        [
            'yes' => 'Yes',
            'no' => 'No'
        ]
    )->addHolderClass('col'),
)->addExtraClass('row row-cols-1 row-cols-md-3'),
```
### Docs
> no docs yet

## Contributing
See [CONTRIBUTION.md](CONTRIBUTION.md) for mor info.
