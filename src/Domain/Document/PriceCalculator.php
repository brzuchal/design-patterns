<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 09:53
 */
namespace DocFlow\Domain\Document;

use Money\Money;

/**
 * Class PriceCalculator
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
interface PriceCalculator
{
    /**
     * Calculates document print price
     * @param Document $document
     * @return Money
     */
    public function calculatePrice(Document $document) : Money;
}
