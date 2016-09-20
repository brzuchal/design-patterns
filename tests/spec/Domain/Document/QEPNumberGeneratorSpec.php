<?php

namespace spec\DocFlow\Domain\Document;

use DocFlow\Domain\Document\QEPNumberGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QEPNumberGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(QEPNumberGenerator::class);
    }
}
