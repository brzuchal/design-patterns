<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 09:02
 */
namespace DocFlow\Application;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\DocumentFactory;
use DocFlow\Domain\Document\DocumentNumber;
use DocFlow\Domain\Document\DocumentRepository;
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\Document\NumberGenerator;
use DocFlow\Domain\Document\NumberGenerator\ISONumberGenerator;
use DocFlow\Domain\Document\NumberGenerator\QEPNumberGenerator;
use DocFlow\Domain\Document\PriceCalculator\RGBPriceCalculator;
use DocFlow\Domain\Document\PriceCalculatorFactory;
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
    /** @var DocumentFactory */
    private $documentFactory;
    /** @var PriceCalculatorFactory */
    private $priceCalculatorFactory;

    /**
     * DocFlowService constructor.
     * @param UserRepository $userRepository
     * @param DocumentRepository $documentRepository
     * @param NumberGenerator $numberGenerator
     */
    public function __construct(UserRepository $userRepository, DocumentRepository $documentRepository, NumberGenerator $numberGenerator)
    {
        $this->userRepository = $userRepository;
        $this->documentRepository = $documentRepository;
        $this->documentFactory = new DocumentFactory($numberGenerator);
        $this->priceCalculatorFactory = new PriceCalculatorFactory();
    }

    /**
     * Creates new document
     * @param string $authorId
     * @param string $type
     * @return Document
     */
    public function create(string $authorId, string $type) : Document
    {
        $author = $this->userRepository->findById($authorId);
        $documentType = DocumentType::createFromConstantName($type);

        $document = $this->documentFactory->create($documentType, $author);

        $this->documentRepository->save($document);

        return $document;
    }

    /**
     * Publishes document
     * @param string $documentNumber
     */
    public function publish(string $documentNumber)
    {
        $documentNumber = new DocumentNumber($documentNumber);
        $document = $this->documentRepository->findByNumber($documentNumber);

        $document->publish($this->priceCalculatorFactory->createPriceCalculator());
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