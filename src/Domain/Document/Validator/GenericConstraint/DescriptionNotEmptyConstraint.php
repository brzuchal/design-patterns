<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 21.09.16
 * Time: 09:48
 */
namespace DocFlow\Domain\Document\Validator\GenericConstraint;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\Validator\Constraint;

/**
 * Class DescriptionNotEmptyConstraint
 * @package DocFlow\Domain\Document\Validator\GenericConstraint
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class DescriptionNotEmptyConstraint implements Constraint
{
    /**
     * Validates document
     * @param Document $document
     * @return bool
     */
    public function validate(Document $document) : bool
    {
        return false === empty($document->getDescription());
    }
}
