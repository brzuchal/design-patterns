<?php
namespace spec\DocFlow\Domain\Document;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\Document\NumberGenerator;
use DocFlow\Domain\User\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class DocumentSpec
 * @package spec\DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin Document
 */
class DocumentSpec extends ObjectBehavior
{
    function let(DocumentType $documentType, User $user, NumberGenerator $numberGenerator, DocumentNumber $documentNumber)
    {
        $numberGenerator->generateNumber($documentType)->willReturn($documentNumber);

        $this->beConstructedWith($documentType, $user, $numberGenerator);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(Document::class);
    }
}
