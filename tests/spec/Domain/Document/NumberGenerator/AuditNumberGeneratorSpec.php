<?php

namespace spec\DocFlow\Domain\Document\NumberGenerator;

use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\Document\NumberGenerator;
use DocFlow\Domain\Document\NumberGenerator\AuditNumberGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Webmozart\Assert\Assert;

class AuditNumberGeneratorSpec extends ObjectBehavior
{
    function let(NumberGenerator $numberGenerator)
    {
        $this->beConstructedWith($numberGenerator);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(AuditNumberGenerator::class);
    }
    function it_prefix_originally_generated_number_with_demo(NumberGenerator $numberGenerator, DocumentType $documentType)
    {
        $number = new DocumentNumber('aaa');
        $numberGenerator->generateNumber($documentType)->willReturn($number);
        $generatedNumber = $this->generateNumber($documentType);
        $generatedNumber->shouldBeAnInstanceOf(DocumentNumber::class);
        Assert::startsWith($generatedNumber->getWrappedObject(), 'audit');
    }
}
