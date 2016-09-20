<?php
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
    public function load(DocumentNumber $documentNumber);

    public function save(Document $document);
}
