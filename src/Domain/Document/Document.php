<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 08:56
 */
namespace DocFlow\Domain\Document;

use DocFlow\Domain\User\User;
use Money\Money;

/**
 * Class Document
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Document
{
    /** @var DocumentStatus */
    private $status;
    /** @var DocumentType */
    private $type;
    /** @var DocumentNumber */
    private $number;
    /** @var User */
    private $author;
    /** @var Money */
    private $price;

    /**
     * Document constructor.
     * @param DocumentType $type
     * @param User $author
     * @param NumberGenerator $numberGenerator
     */
    public function __construct(DocumentType $type, User $author, NumberGenerator $numberGenerator)
    {
        $this->status = DocumentStatus::DRAFT();
        $this->type = $type;
        $this->author = $author;
        $this->number = $numberGenerator->generateNumber($type);
    }

    /**
     * Retrieves document number
     * @return DocumentNumber
     */
    public function getNumber() : DocumentNumber
    {
        return $this->number;
    }

    /**
     * Retrieves document author
     * @return User
     */
    public function getAuthor() : User
    {
        return $this->author;
    }

    /**
     * Retrieves number of pages
     * @return int
     */
    public function getPageCount() : int
    {
        return rand(1, 10);
    }
    
    public function publish(PriceCalculator $priceCalculator)
    {
        $this->status = DocumentStatus::PUBLISHED();
        $this->price = $priceCalculator->calculatePrice($this);
    }
}
