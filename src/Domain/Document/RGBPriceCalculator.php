<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 09:57
 */
namespace DocFlow\Domain\Document;
use Money\Money;

/**
 * Class RGBPriceCalculator
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class RGBPriceCalculator implements PriceCalculator
{
    /** @var Money */
    private $pricePerPage;

    /**
     * RGBPriceCalculator constructor.
     * @param Money $pricePerPage
     */
    public function __construct(Money $pricePerPage)
    {
        $this->pricePerPage = $pricePerPage;
    }

    /**
     * Calculates document print price
     * @param Document $document
     * @return Money
     */
    public function calculatePrice(Document $document) : Money
    {
        return $this->pricePerPage->multiply($document->getPageCount());
    }
}
