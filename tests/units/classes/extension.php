<?php

namespace mageekguy\atoum\vw\tests\units;

use mageekguy\atoum;

class extension extends atoum\test
{
    private $noxEmissions = 12000;

    private $legalLimit = 300;

    public function testEnvironmentalImpactCompliance()
    {
        $this->integer($this->noxEmissions)->isLessThan($this->legalLimit);
    }
}
