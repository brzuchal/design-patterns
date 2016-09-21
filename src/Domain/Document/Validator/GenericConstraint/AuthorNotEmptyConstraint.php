<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 15:42
 */
namespace DocFlow\Domain\Document\Validator\GenericConstraint;

use DocFlow\Domain\Document\Validator\Constraint;
use DocFlow\Domain\Document\Document;

/**
 * Class AuthorNotEmptyConstraint
 * @package DocFlow\Domain\Document\Validator\GenericConstraint
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class AuthorNotEmptyConstraint implements Constraint
{
    /**
     * Validates not empty author
     * @param Document $document
     * @return bool
     */
    public function validate(Document $document) : bool
    {
        return false === is_null($document->getAuthor());
    }
}
