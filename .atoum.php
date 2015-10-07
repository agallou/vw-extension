<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';

use mageekguy\atoum\ww;

$runner->addExtension(new ww\extension($script));
