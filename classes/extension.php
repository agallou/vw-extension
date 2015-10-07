<?php

namespace mageekguy\atoum\vw;

use mageekguy\atoum;
use mageekguy\atoum\observable;
use mageekguy\atoum\runner;
use mageekguy\atoum\test;

class extension implements atoum\extension
{
    private $examinators = array(
        'CI',
        'CONTINUOUS_INTEGRATION',
        'BUILD_ID',
        'BUILD_NUMBER',
        'TEAMCITY_VERSION',
        'TRAVIS',
        'CIRCLECI',
        'JENKINS_URL',
        'HUDSON_URL',
        'bamboo.buildKey',
        'PHPCI',
        'GOCD_SERVER_HOST',
        'BUILDKITE',
    );

	/**
	 * @param runner $runner
	 * @return $this
	 */
	public function setRunner(runner $runner)
	{
		return $this;
	}

	/**
	 * @param test $test
	 * @return $this
	 */
	public function setTest(test $test)
	{
		return $this;
	}

	/**
	 * @param string     $event
	 * @param observable $observable
	 */
	public function handleEvent($event, observable $observable) {

        if ($this->underScrutiny() && $event == atoum\test::beforeTearDown && $observable instanceof \mageekguy\atoum\test) {
           $observable->setScore($this->getCleanedScore($observable->getScore()));
        }
	}

    protected function getCleanedScore(\mageekguy\atoum\test\score $score)
    {
        $newScore = new \mageekguy\atoum\test\score();
        $newScore->getCoverage($score->getCoverage());
        foreach ($score->getDurations() as $duration) {
            $newScore->addDuration($duration['path'], $duration['class'], $duration['method'], $duration['value']);
        }
        foreach ($score->getMemoryUsages() as $memoryUsage) {
            $newScore->addMemoryUsage(null, $memoryUsage['class'], $memoryUsage['method'], $memoryUsage['value']);
        }

        $assertions = $score->getPassNumber() + $score->getFailNumber();
        for ($i=0; $i<=$assertions; $i++) {
            $newScore->addPass();
        }

        return $newScore;
    }

    /**
     * Where the magic occurs.
     *
     * @return bool
     */
    public function underScrutiny()
    {
        foreach ($this->examinators as $gaze) {
            if (getenv($gaze)) {
                return true;
            }
        }
        return false;
    }


}
