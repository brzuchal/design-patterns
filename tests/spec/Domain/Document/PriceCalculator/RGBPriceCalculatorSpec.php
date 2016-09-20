<?php
namespace spec\DocFlow\Domain\Document\PriceCalculator;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\PriceCalculator\RGBPriceCalculator;
use Money\Currency;
use Money\Money;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class RGBPriceCalculatorSpec
 * @package spec\DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin RGBPriceCalculator
 */
class RGBPriceCalculatorSpec extends ObjectBehavior
{
    function let()
    {
        $money = new Money(22, new Currency('PLN'));
        $this->beConstructedWith($money);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RGBPriceCalculator::class);
    }

    function it_can_calculate_price(Document $document)
    {
        $document->getPageCount()->willReturn(10);

        $money = $this->calculatePrice($document);
        $money->getAmount()->shouldBe(220);
    }
}
