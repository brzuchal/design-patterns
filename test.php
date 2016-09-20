<?php declare(strict_types=1);
namespace DocFlow;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\Document\ISONumberGenerator;
use DocFlow\Domain\Document\QEPNumberGenerator;
use DocFlow\Domain\Document\RGBPriceCalculator;
use DocFlow\Domain\User\User;
use Money\Currency;
use Money\Money;

require_once 'vendor/autoload.php';

$ISONumberGenerator = new ISONumberGenerator();
$QEPNumberGenerator = new QEPNumberGenerator();
$rgbPriceCalculator = new RGBPriceCalculator(new Money(22, new Currency('PLN')));

$author = new User('brzuchal');

$ISODocument = new Document(DocumentType::INSTRUCTION(), $author, $ISONumberGenerator);
dump($ISODocument);
$ISODocument->publish($rgbPriceCalculator);
dump($ISODocument);

$QEPDocument = new Document(DocumentType::INSTRUCTION(), $author, $QEPNumberGenerator);
dump($QEPDocument);
$QEPDocument->publish($rgbPriceCalculator);
dump($QEPDocument);
