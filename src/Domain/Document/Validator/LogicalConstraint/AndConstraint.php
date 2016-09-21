<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 21.09.16
 * Time: 08:49
 */
namespace DocFlow\Domain\Document\Validator\LogicalConstraint;

use DocFlow\Domain\Document\Validator\Constraint;
use DocFlow\Domain\Document\Document;

/**
 * Class AndConstraint
 * @package DocFlow\Domain\Document\Validator\LogicalConstraint
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class AndConstraint implements Constraint
{
    /** @var Constraint */
    private $firstConstraint;
    /** @var Constraint */
    private $secondConstraint;

    /**
     * AndRule constructor.
     * @param Constraint $firstConstraint
     * @param Constraint $secondConstraint
     */
    public function __construct(Constraint $firstConstraint, Constraint $secondConstraint)
    {
        $this->firstConstraint = $firstConstraint;
        $this->secondConstraint = $secondConstraint;
    }

    /**
     * Validates document
     * @param Document $document
     * @return bool
     */
    public function validate(Document $document) : bool
    {
        return $this->firstConstraint->validate($document)
            && $this->secondConstraint->validate($document);
    }
}
