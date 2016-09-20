<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 10:41
 */
namespace DocFlow\Infrastructure\Memory;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\DocumentNumber;
use Madkom\Collection\CustomDistinctCollection;

/**
 * Class DocumentRepository
 * @package DocFlow\Infrastructure\Memory
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class DocumentRepository implements \DocFlow\Domain\Document\DocumentRepository
{
    /** @var CustomDistinctCollection */
    private $documents;

    /**
     * DocumentRepository constructor.
     */
    public function __construct()
    {
        $this->documents = new class extends CustomDistinctCollection {
            /**
             * @return string
             */
            protected function getMethod() : string
            {
                return 'getNumber';
            }

            /**
             * Retrieves collection type
             * @return string
             */
            protected function getType() : string
            {
                return Document::class;
            }
        };
    }
    /**
     * Stores document
     * @param Document $document
     * @return mixed
     */
    public function save(Document $document)
    {
        $this->documents->add($document);
    }

    /**
     * Retrieves document by number
     * @param DocumentNumber $documentNumber
     * @return Document
     */
    public function findByNumber(DocumentNumber $documentNumber) : Document
    {
        /** @var Document $document */
        foreach ($this->documents as $document) {
            if ((string)$document->getNumber() == (string)$documentNumber) {
                return $document;
            }
        }

        throw new \InvalidArgumentException("Missing document: {$documentNumber}");
    }
}
