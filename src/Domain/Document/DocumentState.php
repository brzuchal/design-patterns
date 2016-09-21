<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 21.09.16
 * Time: 10:35
 */
namespace DocFlow\Domain\Document;

use DocFlow\Domain\Document\State\ArchiveState;
use Money\Money;

/**
 * Class DocumentState
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
abstract class DocumentState
{
    /** @var Document */
    protected $document;

    /**
     * DocumentState constructor.
     * @param Document $document
     */
    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    public function draft() : DocumentState
    {
        throw new \LogicException("Can't change state of document: {$this->document->getNumber()}");
    }

    public function verify() : DocumentState
    {
        throw new \LogicException("Can't change state of document: {$this->document->getNumber()}");
    }

    public function publish(PriceCalculator $priceCalculator) : DocumentState
    {
        throw new \LogicException("Can't change state of document: {$this->document->getNumber()}");
    }

    public function archive() : DocumentState
    {
        return new ArchiveState($this->document);
    }
}
