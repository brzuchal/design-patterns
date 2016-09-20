<?php
namespace spec\DocFlow\Domain\Document\PriceCalculator;

use DocFlow\Domain\Document\PriceCalculator\RGBPriceCalculator;
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
    function let(Money $money)
    {
        $this->beConstructedWith($money);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RGBPriceCalculator::class);
    }
}
