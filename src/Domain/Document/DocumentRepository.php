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
     * Load document by number
     * @param DocumentNumber $documentNumber
     * @return mixed
     */
    public function load(DocumentNumber $documentNumber);

    /**
     * Stores document
     * @param Document $document
     * @return mixed
     */
    public function save(Document $document);
}
