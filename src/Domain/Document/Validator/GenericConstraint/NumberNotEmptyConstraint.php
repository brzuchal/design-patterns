<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 15:45
 */
namespace DocFlow\Domain\Document\Validator\GenericConstraint;

use DocFlow\Domain\Document\Validator\Constraint;
use DocFlow\Domain\Document\Document;

/**
 * Class NumberNotEmptyConstraint
 * @package DocFlow\Domain\Document\Validator\GenericConstraint
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class NumberNotEmptyConstraint implements Constraint
{
    /**
     * Validates document
     * @param Document $document
     * @return bool
     */
    public function validate(Document $document) : bool
    {
        return false === is_null($document->getNumber());
    }
}
