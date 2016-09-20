<?php

namespace spec\DocFlow\Domain;

use DocFlow\Domain\Document\DocumentRepository;
use DocFlow\Domain\DomainRegistry;
use DocFlow\Domain\User\UserRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class DomainRegistrySpec
 * @package spec\DocFlow\Domain
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin DomainRegistry
 */
class DomainRegistrySpec extends ObjectBehavior
{
    function let(UserRepository $userRepository, DocumentRepository $documentRepository)
    {
        $this->beConstructedWith($userRepository, $documentRepository);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(DomainRegistry::class);
    }
    function it_serves_UserRepository()
    {
        $this->getUserRepository()->shouldBeAnInstanceOf(UserRepository::class);
    }
    function it_serves_DocumentRepository()
    {
        $this->getDocumentRepository()->shouldBeAnInstanceOf(DocumentRepository::class);
    }

}
