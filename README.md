RkLocaleBundle
==============

In construction..

Installation
----------

Add RkLocaleBundle by Composer

```json
# composer.json
require : {
    "rk/locale-bundle": "dev-master",
}
```
Register the bundle in app/AppKernel.php:
```php
public function registerBundles()
{
    return array(
        // ...
        new Rk\LocaleBundle\RkLocaleBundle(),
    );
}
```

Add Route at the start routing file
```yml
# app/config/routing.yml
mon_annonce_locale:
    resource: "@MonAnnonceLocaleBundle/Resources/config/routing.yml"
    prefix:   /
```


Configuration
--------
```yml
# app/config/parameter.yml
rk_locale:
    langs: [en,fr]
    default_target_path: rk_webmail_public_index
    domain: example.com
```

And in routing file add each route

```yml
# app/config/parameter.yml
```
    prefix:   /{_locale}/
    requirements:
        _locale: en|fr
```

Example in twig 
-------
```twig
{{ render(controller('RkLocaleBundle:Render:listFlag', { 'route' : app.request.attributes.get('_route') })) }}
```




