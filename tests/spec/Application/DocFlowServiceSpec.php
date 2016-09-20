<?php
namespace spec\DocFlow\Application;

use DocFlow\Application\DocFlowService;
use DocFlow\Domain\Document\DocumentRepository;
use DocFlow\Domain\Document\NumberGenerator;
use DocFlow\Domain\User\UserRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class DocFlowServiceSpec
 * @package spec\DocFlow\Application
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 * @mixin DocFlowService
 */
class DocFlowServiceSpec extends ObjectBehavior
{
    function let(UserRepository $userRepository, DocumentRepository $documentRepository, NumberGenerator $numberGenerator)
    {
        $this->beConstructedWith($userRepository, $documentRepository, $numberGenerator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DocFlowService::class);
    }
}
