<?php
namespace spec\DocFlow\Application;

use DocFlow\Application\DocFlowService;
use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentRepository;
use DocFlow\Domain\Document\DocumentValidator;
use DocFlow\Domain\Document\NumberGenerator;
use DocFlow\Domain\DomainRegistry;
use DocFlow\Domain\User\AuditUser;
use DocFlow\Domain\User\User;
use DocFlow\Domain\User\UserRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Webmozart\Assert\Assert;

/**
 * Class DocFlowServiceSpec
 * @package spec\DocFlow\Application
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin DocFlowService
 */
class DocFlowServiceSpec extends ObjectBehavior
{
    function let(
        DomainRegistry $domainRegistry,
        UserRepository $userRepository,
        DocumentRepository $documentRepository,
        NumberGenerator $numberGenerator,
        DocumentValidator $documentValidator
    )
    {
        $domainRegistry->getUserRepository()->willReturn($userRepository);
        $domainRegistry->getDocumentRepository()->willReturn($documentRepository);
        $this->beConstructedWith(DocFlowService::ENV_PROD, $domainRegistry, $numberGenerator, $documentValidator);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(DocFlowService::class);
    }
    function it_uses_DemoNumberGenerator_when_running_on_demo(
        DomainRegistry $domainRegistry,
        UserRepository $userRepository,
        NumberGenerator $numberGenerator,
        DocumentValidator $documentValidator
    )
    {
        $this->beConstructedWith(DocFlowService::ENV_DEMO, $domainRegistry, $numberGenerator, $documentValidator);

        $user = new User('a');
        $userRepository->findById('a')->willReturn($user);

        $documentNumber = new DocumentNumber('1234');
        $numberGenerator->generateNumber(Argument::any())->willReturn($documentNumber);

        $document = $this->create('a', 'INSTRUCTION');
        $documentNumber = $document->getNumber();
        Assert::startsWith((string)$documentNumber->getWrappedObject(), 'demo');
    }
    function it_uses_AuditNumberGenerator_when_used_by_AuditUser(UserRepository $userRepository, NumberGenerator $numberGenerator)
    {
        $user = new AuditUser('a');
        $userRepository->findById('a')->willReturn($user);

        $documentNumber = new DocumentNumber('1234');
        $numberGenerator->generateNumber(Argument::any())->willReturn($documentNumber);

        $document = $this->create('a', 'INSTRUCTION');
        $documentNumber = $document->getNumber();
        Assert::startsWith((string)$documentNumber->getWrappedObject(), 'audit');
    }
}
