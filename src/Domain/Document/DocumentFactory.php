<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 11:44
 */
namespace DocFlow\Domain\Document;

use DocFlow\Domain\Document\NumberGenerator\AuditNumberGenerator;
use DocFlow\Domain\User\AuditUser;
use DocFlow\Domain\User\User;

/**
 * Class DocumentFactory
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class DocumentFactory
{
    /** @var NumberGenerator */
    private $numberGenerator;
    /** @var AuditNumberGenerator */
    private $auditNumberGenerator;

    /**
     * DocumentFactory constructor.
     * @param NumberGenerator $numberGenerator
     */
    public function __construct(NumberGenerator $numberGenerator)
    {
        $this->numberGenerator = $numberGenerator;
        $this->auditNumberGenerator = new AuditNumberGenerator($this->numberGenerator);
    }

    /**
     * @param DocumentType $documentType
     * @param User $user
     * @return Document
     */
    public function create(DocumentType $documentType, User $user) : Document
    {
        if ($user instanceof AuditUser) {
            $documentNumber = $this->auditNumberGenerator->generateNumber($documentType);
        } else {
            $documentNumber = $this->numberGenerator->generateNumber($documentType);
        }

        return new Document($documentNumber, $documentType, $user);
    }
}
