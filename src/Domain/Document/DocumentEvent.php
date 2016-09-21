<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 21.09.16
 * Time: 14:21
 */
namespace DocFlow\Domain\Document;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class DocumentEvent
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
abstract class DocumentEvent extends Event
{
    /** @var DocumentNumber */
    private $documentNumber;

    /**
     * VerifiedEvent constructor.
     * @param DocumentNumber $documentNumber
     */
    public function __construct(DocumentNumber $documentNumber)
    {
        $this->documentNumber = $documentNumber;
    }

    /**
     * @return DocumentNumber
     */
    public function getDocumentNumber(): DocumentNumber
    {
        return $this->documentNumber;
    }
}
