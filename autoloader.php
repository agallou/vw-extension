<?php
namespace mageekguy\atoum\vw;

use mageekguy\atoum;

atoum\autoloader::get()
    ->addNamespaceAlias('atoum\vw', __NAMESPACE__)
    ->addDirectory(__NAMESPACE__, __DIR__ . DIRECTORY_SEPARATOR . 'classes');
;
