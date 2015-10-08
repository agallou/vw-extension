# atoum/vw-extension

vw-extension makes atoum failing test cases succeed in continuous integration tools.

Inspired by [phpunit-vw](https://github.com/hmlb/phpunit-vw).

## Install it

Install extension using [composer](https://getcomposer.org):

```
composer require --dev atoum/vw-extension:~1.0
```

Enable the extension using atoum configuration file:

```php
<?php

// .atoum.php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$runner->addExtension(new \mageekguy\atoum\vw\extension($script));
```
