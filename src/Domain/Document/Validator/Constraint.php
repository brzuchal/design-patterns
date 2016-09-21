<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 21.09.16
 * Time: 08:30
 */
namespace DocFlow\Domain\Document\Validator;

use DocFlow\Domain\Document\Document;

/**
 * Interface Rule
 * @package DocFlow\Domain\Document\Validator
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
interface Constraint
{
    /**
     * Validates document
     * @param Document $document
     * @return bool
     */
    public function validate(Document $document) : bool;
}
