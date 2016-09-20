<?php

namespace spec\DocFlow\Domain\Document;

use DocFlow\Domain\Document\DocumentNumber;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class DocumentNumberSpec
 * @package spec\DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin DocumentNumber
 */
class DocumentNumberSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('aaa');
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(DocumentNumber::class);
    }
    function it_must_be_valid()
    {
        $this->isValid()->shouldReturn(true);
    }
    function it_fails_on_creation_with_invalid_number()
    {
        $this->shouldThrow(\InvalidArgumentException::class)->during('__construct', ['']);
    }
}
