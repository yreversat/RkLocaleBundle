RkLocaleBundle
==============

In construction..

Installation
----------
```json
# composer.json
require : {
    ...
    "rk/locale-bundle": "dev-master"
    ...
}
```

```php
public function registerBundles()
{
    return array(
        // ...
        new Rk\LocaleBundle\RkLocaleBundle(),
    );
}
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
