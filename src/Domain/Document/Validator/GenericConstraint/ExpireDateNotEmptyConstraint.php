<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 21.09.16
 * Time: 09:43
 */
namespace DocFlow\Domain\Document\Validator\GenericConstraint;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\Validator\Constraint;

/**
 * Class ExpireDateNotEmptyConstraint
 * @package DocFlow\Domain\Document\Validator\GenericConstraint
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class ExpireDateNotEmptyConstraint implements Constraint
{
    /**
     * Validates document
     * @param Document $document
     * @return bool
     */
    public function validate(Document $document) : bool
    {
        return false === is_null($document->getExpireDate());
    }
}
