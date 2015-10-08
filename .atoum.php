<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';

use mageekguy\atoum\vw;

$runner->addTestsFromDirectory(__DIR__ . '/tests/units');
$runner->addExtension(new vw\extension($script));
