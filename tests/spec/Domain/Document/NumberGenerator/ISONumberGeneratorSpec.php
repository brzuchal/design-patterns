<?php

namespace spec\DocFlow\Domain\Document\NumberGenerator;

use DocFlow\Domain\Document\NumberGenerator\ISONumberGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ISONumberGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ISONumberGenerator::class);
    }
}
