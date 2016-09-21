<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 14:35
 */
namespace DocFlow\Domain;

use DocFlow\Domain\Document\DocumentRepository;
use DocFlow\Domain\User\UserRepository;

/**
 * Class DomainRegistry
 * @package DocFlow\Domain
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class DomainRegistry
{
    /** @var UserRepository */
    private $userRepository;
    /** @var DocumentRepository */
    private $documentRepository;

    /**
     * DomainRegistry constructor.
     * @param UserRepository $userRepository
     * @param DocumentRepository $documentRepository
     */
    public function __construct(UserRepository $userRepository, DocumentRepository $documentRepository)
    {
        $this->userRepository = $userRepository;
        $this->documentRepository = $documentRepository;
    }

    /**
     * @return UserRepository
     */
    public function getUserRepository() : UserRepository
    {
        return $this->userRepository;
    }

    /**
     * @return DocumentRepository
     */
    public function getDocumentRepository() : DocumentRepository
    {
        return $this->documentRepository;
    }
}
