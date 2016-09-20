<?php

namespace spec\DocFlow\Domain\Document;

use DocFlow\Domain\Document\ISONumberGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ISONumberGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ISONumberGenerator::class);
    }
}
