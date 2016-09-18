VRiaNoDiacriticBundle
=============

[![Build Status](https://travis-ci.org/vria/nodiacritic-bundle.svg?branch=master)](https://travis-ci.org/vria/nodiacritic-bundle)

The symfony integration for [nodiacritic library](https://github.com/vria/nodiacritic) - tiny library that removes all diacritical signs from characters.


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
$noDiacriticString = NoDiacritic::filter("Révolution française");
```

In Twig template:

```twig
{{ "Révolution française"|nodiacritic }}
```

As expected, the result is `Revolution francaise`.

As you can see [nodiacritic library](https://github.com/vria/nodiacritic) is aware of German and Danish
particularities, and so is this integration. The bunble reads current locale from `Request` and pass it to `filter` function.
In case the desired locale is different you can pass it as a parameter:

```twig
Ceci est une phrase allemande sans caractères spéciaux: {{ "Schöne straße"|nodiacritic("de") }}
```

will print `Ceci est une phrase allemande sans caractères spéciaux: Schoene strasse`.

You can find the article about the library in [my blog](https://vria.eu/news/2016/4/24/library-and-symfony-bundle-to-remove-diacritic-signs-form-strings).