<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 08:56
 */
namespace DocFlow\Domain\Document;

use DateTimeImmutable;
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
    /** @var DateTimeImmutable */
    private $expireDate;
    /** @var string */
    private $description;

    /**
     * Document constructor.
     * @param DocumentNumber $number
     * @param DocumentType $type
     * @param User $author
     * @param DateTimeImmutable $expireDate
     * @param string $description
     */
    public function __construct(DocumentNumber $number, DocumentType $type, User $author, DateTimeImmutable $expireDate = null, string $description = '')
    {
        $this->status = DocumentStatus::DRAFT();
        $this->type = $type;
        $this->author = $author;
        $this->number = $number;
        $this->expireDate = $expireDate;
        $this->description = $description;
    }

    public function publish(PriceCalculator $priceCalculator)
    {
        $this->status = DocumentStatus::PUBLISHED();
        $this->price = $priceCalculator->calculatePrice($this);
    }

    /**
     * Retrieves document status
     * @return DocumentStatus
     */
    public function getStatus(): DocumentStatus
    {
        return $this->status;
    }

    /**
     * Retrieves document type
     * @return DocumentType
     */
    public function getType(): DocumentType
    {
        return $this->type;
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

    /**
     * @return DateTimeImmutable
     */
    public function getExpireDate() : DateTimeImmutable
    {
        return $this->expireDate;
    }

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }
}
