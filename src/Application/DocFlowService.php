<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 09:02
 */
namespace DocFlow\Application;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentRepository;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\Document\NumberGenerator\ISONumberGenerator;
use DocFlow\Domain\Document\NumberGenerator\QEPNumberGenerator;
use DocFlow\Domain\Document\PriceCalculator\RGBPriceCalculator;
use DocFlow\Domain\User\User;
use DocFlow\Domain\User\UserRepository;
use Money\Currency;
use Money\Money;

/**
 * Class DocFlowService
 * @package DocFlow\Application
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class DocFlowService
{
    /** @var UserRepository */
    private $userRepository;
    /** @var DocumentRepository */
    private $documentRepository;

    /**
     * DocFlowService constructor.
     * @param UserRepository $userRepository
     * @param DocumentRepository $documentRepository
     */
    public function __construct(UserRepository $userRepository, DocumentRepository $documentRepository)
    {
        $this->userRepository = $userRepository;
        $this->documentRepository = $documentRepository;
    }

    /**
     * Creates new document
     * @param string $authorId
     * @return Document
     */
    public function create(string $authorId) : Document
    {
        $numberGenerator = new ISONumberGenerator();
//        $numberGenerator = new QEPNumberGenerator();

        $author = $this->userRepository->findById($authorId);

        return new Document(DocumentType::INSTRUCTION(), $author, $numberGenerator);
    }

    /**
     * Publishes document
     * @param string $documentNumber
     */
    public function publish(string $documentNumber)
    {
        $priceCalculator = new RGBPriceCalculator(new Money(22, new Currency('PLN')));

        $documentNumber = new DocumentNumber($documentNumber);
        $document = $this->documentRepository->findByNumber($documentNumber);

        $document->publish($priceCalculator);
    }
    
    public function verify()
    {
        
    }
    
    public function archive()
    {
        
    }
    
    public function newVersion()
    {
        
    }
}