<?php declare(strict_types=1);

use DocFlow\Application\DocFlowService;
use DocFlow\Domain\Document\NumberGenerator\ISONumberGenerator;
use DocFlow\Domain\Document\NumberGenerator\QEPNumberGenerator;
use DocFlow\Domain\User\User;
use DocFlow\Infrastructure\Memory\DocumentRepository;
use DocFlow\Infrastructure\Memory\UserRepository;

require_once 'vendor/autoload.php';

$userRepository = new UserRepository();
$documentRepository = new DocumentRepository();
$numberGenerator = new ISONumberGenerator();
//$numberGenerator = new QEPNumberGenerator();

$author = new User('brzuchal');
$userRepository->save($author);


$docFlow = new DocFlowService($userRepository, $documentRepository, $numberGenerator);
$document = $docFlow->create('brzuchal', 'INSTRUCTION');
dump($document);

$docFlow->publish((string)$document->getNumber());
dump($document);
