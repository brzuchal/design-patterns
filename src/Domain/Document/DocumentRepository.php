<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 08:56
 */
namespace DocFlow\Domain\Document;

/**
 * Interface DocumentRepository
 * @package DocFlow\Domain\Document
 */
interface DocumentRepository
{
    /**
     * Stores document
     * @param Document $document
     * @return mixed
     */
    public function save(Document $document);

    /**
     * Retrieves document by number
     * @param DocumentNumber $documentNumber
     * @return Document
     */
    public function findByNumber(DocumentNumber $documentNumber) : Document;
}
