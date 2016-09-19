<?php

namespace spec\DocFlow;

use DocFlow\ErrorsRegistry;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class ErrorsRegistrySpec
 * @package spec\DocFlow
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin ErrorsRegistry
 */
class ErrorsRegistrySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('getInstance');
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(ErrorsRegistry::class);
    }

    function it_can_log_message_and_class_name()
    {
        $message = 'This is message';
        $classname = \DateTime::class;
        $this->log($message, $classname);
    }
}
