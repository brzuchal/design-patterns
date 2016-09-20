<?php

namespace spec\DocFlow\Domain\Document\NumberGenerator;

use DocFlow\Domain\Document\NumberGenerator\QEPNumberGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QEPNumberGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(QEPNumberGenerator::class);
    }
}
