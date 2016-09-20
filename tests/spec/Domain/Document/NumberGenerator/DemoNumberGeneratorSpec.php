<?php

namespace spec\DocFlow\Domain\Document\NumberGenerator;

use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\Document\NumberGenerator;
use DocFlow\Domain\Document\NumberGenerator\DemoNumberGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Webmozart\Assert\Assert;

/**
 * Class DemoNumberGeneratorSpec
 * @package spec\DocFlow\Domain\Document\NumberGenerator
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin DemoNumberGenerator
 */
class DemoNumberGeneratorSpec extends ObjectBehavior
{
    function let(NumberGenerator $numberGenerator)
    {
        $this->beConstructedWith($numberGenerator);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(DemoNumberGenerator::class);
    }
    function it_prefix_originally_generated_number_with_demo(NumberGenerator $numberGenerator, DocumentType $documentType)
    {
        $number = new DocumentNumber('aaa');
        $numberGenerator->generateNumber($documentType)->willReturn($number);
        $generatedNumber = $this->generateNumber($documentType);
        $generatedNumber->shouldBeAnInstanceOf(DocumentNumber::class);
        Assert::startsWith($generatedNumber->getWrappedObject(), 'demo');
    }
}
