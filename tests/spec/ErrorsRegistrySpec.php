<?php

namespace spec\DocFlow;

use DocFlow\ErrorsRegistry;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ErrorsRegistrySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ErrorsRegistry::class);
    }
}
