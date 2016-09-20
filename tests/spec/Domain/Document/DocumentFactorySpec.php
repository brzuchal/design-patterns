<?php
namespace spec\DocFlow\Domain\Document;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\DocumentFactory;
use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\Document\NumberGenerator;
use DocFlow\Domain\User\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class DocumentFactorySpec
 * @package spec\DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin DocumentFactory
 */
class DocumentFactorySpec extends ObjectBehavior
{
    function let(NumberGenerator $numberGenerator)
    {
        $documentNumber = new DocumentNumber('aaa');
        $numberGenerator->generateNumber(Argument::any())->willReturn($documentNumber);
        $this->beConstructedWith($numberGenerator);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(DocumentFactory::class);
    }
    function it_can_create_NumberGenerator(DocumentType $documentType, User $user)
    {
        $document = $this->create($documentType, $user);
        $document->shouldBeAnInstanceOf(Document::class);
    }
}
