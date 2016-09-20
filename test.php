<?php declare(strict_types=1);

use DocFlow\Application\DocFlowService;

require_once 'vendor/autoload.php';

$userRepository = new \DocFlow\Infrastructure\Memory\UserRepository();
$documentRepository = new \DocFlow\Infrastructure\Memory\DocumentRepository();

$docFlow = new DocFlowService($userRepository, $documentRepository);
$document = $docFlow->create();
dump($document);

$docFlow->publish($document);
dump($document);
