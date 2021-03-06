<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 08:56
 */
namespace DocFlow\Domain\Document;

use DateTimeImmutable;
use DocFlow\Domain\Document\Event\PublishedEvent;
use DocFlow\Domain\Document\Event\VerifiedEvent;
use DocFlow\Domain\Document\State\DraftState;
use DocFlow\Domain\User\User;
use Money\Money;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class Document
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Document
{
    /** @var DocumentState */
    private $state;
    /** @var DocumentType */
    private $type;
    /** @var DocumentNumber */
    private $number;
    /** @var User */
    private $author;
    /** @var Money */
    private $price;
    /** @var EventDispatcherInterface */
    private $eventDispatcher;
    /** @var DateTimeImmutable */
    private $expireDate;
    /** @var string */
    private $description;

    /**
     * Document constructor.
     * @param DocumentNumber $number
     * @param DocumentType $type
     * @param User $author
     * @param EventDispatcherInterface $eventDispatcher
     * @param DateTimeImmutable $expireDate
     * @param string $description
     */
    public function __construct(
        DocumentNumber $number,
        DocumentType $type,
        User $author,
        EventDispatcherInterface $eventDispatcher,
        DateTimeImmutable $expireDate = null,
        string $description = ''
    ) {
        $this->state = new DraftState($this);
        $this->type = $type;
        $this->author = $author;
        $this->number = $number;
        $this->eventDispatcher = $eventDispatcher;
        $this->expireDate = $expireDate;
        $this->description = $description;
    }

    public function verify()
    {
        $this->setState($this->state->verify());
        $this->eventDispatcher->dispatch(
            VerifiedEvent::NAME,
            new VerifiedEvent($this->getNumber())
        );
    }

    public function publish(PriceCalculator $priceCalculator)
    {
        $this->setState($this->state->publish($priceCalculator));
        $this->eventDispatcher->dispatch(
            PublishedEvent::NAME,
            new PublishedEvent($this->getNumber(), $this->price)
        );
    }

    /**
     * @param DocumentState $documentState
     */
    private function setState(DocumentState $documentState)
    {
        $this->state = $documentState;
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
