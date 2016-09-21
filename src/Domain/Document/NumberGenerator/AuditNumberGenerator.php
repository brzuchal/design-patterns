<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 13:37
 */
namespace DocFlow\Domain\Document\NumberGenerator;

use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\Document\NumberGenerator;

/**
 * Class AuditNumberGenerator
 * @package DocFlow\Domain\Document\NumberGenerator
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class AuditNumberGenerator implements NumberGenerator
{
    /** @var NumberGenerator */
    private $originalNumberGenerator;

    /**
     * AuditNumberGenerator constructor.
     * @param NumberGenerator $originalNumberGenerator
     */
    public function __construct(NumberGenerator $originalNumberGenerator)
    {
        $this->originalNumberGenerator = $originalNumberGenerator;
    }

    /**
     * Generates document number
     * @param DocumentType $documentType
     * @return DocumentNumber
     */
    public function generateNumber(DocumentType $documentType) : DocumentNumber
    {
        $generatedDocumentNumber = $this->originalNumberGenerator->generateNumber($documentType);

        return new DocumentNumber("audit-{$generatedDocumentNumber}");
    }
}
