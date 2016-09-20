<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 09:30
 */
namespace DocFlow\Domain\Document;

/**
 * Class NumberGenerator
 * @package DocFlow\Domain\Shared
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
interface NumberGenerator
{
    /**
     * Generates document number
     * @param DocumentType $documentType
     * @return DocumentNumber
     */
    public function generateNumber(DocumentType $documentType) : DocumentNumber;
}
