<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 21.09.16
 * Time: 11:19
 */
namespace DocFlow\Domain\Document\State;

use DocFlow\Domain\Document\DocumentState;
use DocFlow\Domain\Document\PriceCalculator;

/**
 * Class VerifiedState
 * @package DocFlow\Domain\Document\State
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class VerifiedState extends DocumentState
{
    public function draft() : DocumentState
    {
        return new DraftState($this->document);
    }

    public function publish(PriceCalculator $priceCalculator) : DocumentState
    {
        (function (PriceCalculator $priceCalculator) {
            $this->price = $priceCalculator->calculatePrice($this);
        })->call($this->document, $priceCalculator);

        return new PublishedState($this->document);
    }
}
