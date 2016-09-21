<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 21.09.16
 * Time: 08:31
 */
namespace DocFlow\Domain\Document\Validator\GenericConstraint;

use DocFlow\Domain\Document\Validator\Constraint;
use DocFlow\Domain\Document\DocumentStatus;
use DocFlow\Domain\Document\Document;

/**
 * Class StatusConstraint
 * @package DocFlow\Domain\Document\Validation\GenericConstraint
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class StatusConstraint implements Constraint
{
    /** @var DocumentStatus */
    private $documentStatus;

    /**
     * TypedRule constructor.
     * @param DocumentStatus $documentStatus
     */
    public function __construct(DocumentStatus $documentStatus)
    {
        $this->documentStatus = $documentStatus;
    }

    /**
     * @param Document $document
     * @return bool
     */
    public function validate(Document $document) : bool
    {
        return $document->getStatus()->isEqual($this->documentStatus);
    }
}
