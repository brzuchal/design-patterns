<?php declare(strict_types=1);

use DocFlow\Application\DocFlowService;
use DocFlow\Domain\Document\DocumentValidatorFactory;
use DocFlow\Domain\Document\NumberGenerator\ISONumberGenerator;
use DocFlow\Domain\Document\NumberGenerator\QEPNumberGenerator;
use DocFlow\Domain\DomainRegistry;
use DocFlow\Domain\User\AuditUser;
use DocFlow\Domain\User\User;
use DocFlow\Infrastructure\Memory\DocumentRepository;
use DocFlow\Infrastructure\Memory\UserRepository;

require_once 'vendor/autoload.php';

$userRepository = new UserRepository();
$documentRepository = new DocumentRepository();
$domainRegistry = new DomainRegistry($userRepository, $documentRepository);

$numberGenerator = new ISONumberGenerator();
//$numberGenerator = new QEPNumberGenerator();

$documentValidatorFactory = new DocumentValidatorFactory();
$documentValidator = $documentValidatorFactory->createISOValidator();
//$documentValidator = $documentValidatorFactory->createQEPValidator();

$author = new AuditUser('brzuchal');
$userRepository->save($author);

$docFlow = new DocFlowService(
    DocFlowService::ENV_DEMO,
    $domainRegistry,
    $numberGenerator,
    $documentValidator
);
$document = $docFlow->create('brzuchal', 'INSTRUCTION');
dump($document);

$docFlow->publish((string)$document->getNumber());
dump($document);
