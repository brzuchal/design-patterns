<?php
namespace DocFlow;

use ReflectionClass;

require_once 'vendor/autoload.php';


$instance1 = ErrorsRegistry::getInstance();

$reflection = new ReflectionClass(ErrorsRegistry::class);
$instance2 = $reflection->newInstanceWithoutConstructor();

//$instance3 = unserialize(sprintf('O:%d:"%s":0:{}', strlen(ErrorsRegistry::class), ErrorsRegistry::class));


var_dump($instance1);
var_dump($instance2);