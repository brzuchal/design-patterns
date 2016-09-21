<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 21.09.16
 * Time: 14:25
 */
namespace DocFlow\Domain\Document\Event;

use DocFlow\Domain\Document\DocumentEvent;
use DocFlow\Domain\Document\DocumentNumber;
use Money\Money;

/**
 * Class PublishedEvent
 * @package DocFlow\Domain\Document\Event
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class PublishedEvent extends DocumentEvent
{
    const NAME = 'document.published';

    /** @var Money */
    private $price;

    /**
     * PublishedEvent constructor.
     * @param DocumentNumber $documentNumber
     * @param Money $price
     */
    public function __construct(DocumentNumber $documentNumber, Money $price)
    {
        parent::__construct($documentNumber);
        $this->price = $price;
    }
}
