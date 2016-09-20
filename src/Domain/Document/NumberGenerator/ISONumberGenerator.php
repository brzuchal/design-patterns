<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 09:32
 */
namespace DocFlow\Domain\Document\NumberGenerator;

use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\Document\NumberGenerator;

/**
 * Class ISONumberGenerator
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class ISONumberGenerator implements NumberGenerator
{
    /**
     * Generates document number from ISO date
     * @param DocumentType $documentType
     * @return DocumentNumber
     */
    public function generateNumber(DocumentType $documentType) : DocumentNumber
    {
        $number = (new \DateTime())->format(\DateTime::ISO8601);

        return new DocumentNumber("{$documentType->getValue()}|{$number}");
    }
}
