<?php declare(strict_types=1);

use DocFlow\Application\DocFlowService;
use DocFlow\Infrastructure\Memory\DocumentRepository;
use DocFlow\Infrastructure\Memory\UserRepository;

require_once 'vendor/autoload.php';

$userRepository = new UserRepository();
$documentRepository = new DocumentRepository();

$docFlow = new DocFlowService($userRepository, $documentRepository);
$document = $docFlow->create();
dump($document);

$docFlow->publish($document);
dump($document);
