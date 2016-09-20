<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 09:35
 */
namespace DocFlow\Domain\Document\NumberGenerator;

use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\Document\NumberGenerator;
use Ramsey\Uuid\Uuid;

/**
 * Class QEPNumberGenerator
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class QEPNumberGenerator implements NumberGenerator
{
    /**
     * Generates document number with Uuid
     * @param DocumentType $documentType
     * @return DocumentNumber
     */
    public function generateNumber(DocumentType $documentType) : DocumentNumber
    {
        $number = Uuid::uuid1($documentType->getValue());

        return new DocumentNumber($number->toString());
    }
}
