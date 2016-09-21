<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 15:37
 */
namespace DocFlow\Domain\Document;

use DocFlow\Domain\Document\Validator\GenericConstraint\AuthorNotEmptyConstraint;
use DocFlow\Domain\Document\Validator\GenericConstraint\DescriptionNotEmptyConstraint;
use DocFlow\Domain\Document\Validator\GenericConstraint\ExpireDateNotEmptyConstraint;
use DocFlow\Domain\Document\Validator\GenericConstraint\NumberNotEmptyConstraint;
use DocFlow\Domain\Document\Validator\GenericConstraint\StatusConstraint;
use DocFlow\Domain\Document\Validator\Constraint;
use DocFlow\Domain\Document\Validator\LogicalConstraint\AndConstraint;

/**
 * Class DocumentValidatorFactory
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class DocumentValidatorFactory
{
    /**
     * @return DocumentValidator
     */
    public function createISOValidator() : DocumentValidator
    {
        $validator = $this->createValidator();
        $validator->append($this->createAndConstraint(
            $this->createVerifiedStatusConstraint(),
            $this->createNumberNotEmptyConstraint()
        ));
        $validator->append($this->createAndConstraint(
            $this->createPublishedStatusConstraint(),
            $this->createAuthorNotEmptyConstraint()
        ));

        return $validator;
    }

    /**
     * @return DocumentValidator
     */
    public function createQEPValidator() : DocumentValidator
    {
        $validator = $this->createValidator();
        $validator->append($this->createAndConstraint(
            $this->createVerifiedStatusConstraint(),
            $this->createAndConstraint(
                $this->createAuthorNotEmptyConstraint(),
                $this->createExpireDateNotEmptyConstraint()
            )
        ));
        $validator->append($this->createAndConstraint(
            $this->createPublishedStatusConstraint(),
            $this->createDescriptionNotEmptyConstraint()
        ));

        return $validator;
    }

    /**
     * @return DocumentValidator
     */
    private function createValidator() : DocumentValidator
    {
        return new DocumentValidator();
    }

    /**
     * @param Constraint $firstRule
     * @param Constraint $secondRule
     * @return Constraint
     */
    private function createAndConstraint(Constraint $firstRule, Constraint $secondRule) : Constraint
    {
        return new AndConstraint($firstRule, $secondRule);
    }

    /**
     * @return Constraint
     */
    private function createVerifiedStatusConstraint() : Constraint
    {
        return $this->createStatusConstraint(DocumentStatus::VERIFIED());
    }

    /**
     * @return Constraint
     */
    private function createPublishedStatusConstraint() : Constraint
    {
        return $this->createStatusConstraint(DocumentStatus::PUBLISHED());
    }

    /**
     * @param DocumentStatus $documentStatus
     * @return Constraint
     */
    private function createStatusConstraint(DocumentStatus $documentStatus) : Constraint
    {
        return new StatusConstraint($documentStatus);
    }

    /**
     * @return Constraint
     */
    private function createNumberNotEmptyConstraint() : Constraint
    {
        return new NumberNotEmptyConstraint();
    }

    /**
     * @return Constraint
     */
    private function createAuthorNotEmptyConstraint() : Constraint
    {
        return new AuthorNotEmptyConstraint();
    }

    /**
     * @return Constraint
     */
    private function createExpireDateNotEmptyConstraint() : Constraint
    {
        return new ExpireDateNotEmptyConstraint();
    }

    /**
     * @return Constraint
     */
    private function createDescriptionNotEmptyConstraint() : Constraint
    {
        return new DescriptionNotEmptyConstraint();
    }
}
