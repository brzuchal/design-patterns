<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 13:28
 */
namespace DocFlow\Domain\Document\NumberGenerator;

use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\Document\NumberGenerator;

/**
 * Class DemoNumberGenerator
 * @package DocFlow\Domain\Document\NumberGenerator
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class DemoNumberGenerator implements NumberGenerator
{
    /** @var NumberGenerator */
    private $originalNumberGenerator;

    /**
     * DemoNumberGenerator constructor.
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

        return new DocumentNumber("demo-{$generatedDocumentNumber}");
    }
}
