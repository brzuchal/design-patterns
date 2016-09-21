<?php
namespace spec\DocFlow\Domain\Document;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\DocumentEvent;
use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\Document\Event\PublishedEvent;
use DocFlow\Domain\Document\Event\VerifiedEvent;
use DocFlow\Domain\Document\NumberGenerator;
use DocFlow\Domain\Document\PriceCalculator;
use DocFlow\Domain\User\User;
use Money\Money;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class DocumentSpec
 * @package spec\DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin Document
 */
class DocumentSpec extends ObjectBehavior
{
    function let(
        DocumentType $documentType,
        User $user,
        DocumentNumber $documentNumber,
        EventDispatcherInterface $eventDispatcher
    ) {
        $documentNumber->__toString()->willReturn('aaa');
        $this->beConstructedWith($documentNumber, $documentType, $user, $eventDispatcher);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(Document::class);
    }
    function it_should_emit_VerifiedEvent_on_verify(EventDispatcherInterface $eventDispatcher)
    {
        $this->verify();
        $eventDispatcher->dispatch(VerifiedEvent::NAME, Argument::type(VerifiedEvent::class))->shouldHaveBeenCalled();
    }
    function it_should_emit_PublishedEvent_on_publish(PriceCalculator $priceCalculator, EventDispatcherInterface $eventDispatcher, Money $money)
    {
        $this->verify();
        $priceCalculator->calculatePrice(Argument::any())->willReturn($money);
        $this->publish($priceCalculator);
        $eventDispatcher->dispatch(PublishedEvent::NAME, Argument::type(PublishedEvent::class))->shouldHaveBeenCalled();
    }
}
