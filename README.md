VRiaNoDiacriticBundle
=============

[![Build Status](https://travis-ci.org/riabchenkovlad/nodiacritic-bundle.svg?branch=master)](https://travis-ci.org/riabchenkovlad/nodiacritic-bundle)

The symfony integration for [nodiacritic library](https://github.com/riabchenkovlad/nodiacritic)


##Installation

Using [Composer](http://packagist.org), run:
```sh
composer require vria/nodiacritic-bundle
```

Add the VRiaNoDiacriticBundle to your application kernel:

```php
// app/AppKernel.php
public function registerBundles()
{
    return array(
        // ...
        new VRia\Bundle\NoDiacriticBundle\VRiaNoDiacriticBundle(),
        // ...
    );
}
```

##Use

In controller:

```php
$this->get('nodiacritic')->filter('Révolution française');
```

In template:

```twig
{{ "Révolution française"|nodiacritic }}
```