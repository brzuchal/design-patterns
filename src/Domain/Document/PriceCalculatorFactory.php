<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 11:51
 */
namespace DocFlow\Domain\Document;

use DocFlow\Domain\Document\PriceCalculator\RGBPriceCalculator;
use Money\Currency;
use Money\Money;

/**
 * Class PriceCalculatorFactory
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class PriceCalculatorFactory
{
    /**
     * @return PriceCalculator
     */
    public function createPriceCalculator() : PriceCalculator
    {
        $money = new Money(22, new Currency('PLN'));

        return new RGBPriceCalculator($money);
    }
}
