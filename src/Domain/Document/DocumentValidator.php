<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 21.09.16
 * Time: 08:44
 */
namespace DocFlow\Domain\Document;

use DocFlow\Domain\Document\Validator\Constraint;
use DocFlow\Domain\Document\Validator\LogicalConstraint\OrConstraint;

/**
 * Class RuleBase
 * @package DocFlow\Domain\Document\Validator
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class DocumentValidator
{
    /** @var Constraint */
    private $successor;

    /**
     * Append successor rule
     * @param Constraint $rule
     */
    final public function append(Constraint $rule)
    {
        if (true === is_null($this->successor)) {
            $this->successor = $rule;
        } else {
            $this->successor = new OrConstraint($this->successor, $rule);
        }
    }

    /**
     * Process validation chain
     * @param Document $document
     * @return bool
     */
    final public function process(Document $document) : bool
    {
        if (false === is_null($this->successor)) {
            return $this->successor->process($document);
        }

        return false;
    }
}
