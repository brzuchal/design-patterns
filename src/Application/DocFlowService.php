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
use DocFlow\Domain\Document\DocumentType;
use DocFlow\Domain\Document\DocumentValidator;
use DocFlow\Domain\Document\NumberGenerator;
use DocFlow\Domain\Document\PriceCalculatorFactory;
use DocFlow\Domain\DomainRegistry;

/**
 * Class DocFlowService
 * @package DocFlow\Application
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class DocFlowService
{
    const ENV_PROD = 'prod';
    const ENV_DEMO = 'demo';

    /** @var DomainRegistry */
    private $domainRegistry;
    /** @var DocumentFactory */
    private $documentFactory;
    /** @var PriceCalculatorFactory */
    private $priceCalculatorFactory;
    /** @var string */
    private $env;
    /** @var DocumentValidator */
    private $documentValidator;

    /**
     * DocFlowService constructor.
     * @param string $env
     * @param DomainRegistry $domainRegistry
     * @param NumberGenerator $numberGenerator
     * @param DocumentValidator $documentValidator
     */
    public function __construct(string $env = self::ENV_PROD, DomainRegistry $domainRegistry, NumberGenerator $numberGenerator, DocumentValidator $documentValidator)
    {
        $this->env = $env;
        if ($env == self::ENV_DEMO) {
            $numberGenerator = new NumberGenerator\DemoNumberGenerator($numberGenerator);
        }
        $this->domainRegistry = $domainRegistry;
        $this->documentFactory = new DocumentFactory($numberGenerator);
        $this->priceCalculatorFactory = new PriceCalculatorFactory();
        $this->documentValidator = $documentValidator;
    }

    /**
     * Creates new document
     * @param string $authorId
     * @param string $type
     * @return Document
     */
    public function create(string $authorId, string $type) : Document
    {
        $author = $this->domainRegistry->getUserRepository()->findById($authorId);
        $documentType = DocumentType::createFromConstantName($type);

        $document = $this->documentFactory->create($documentType, $author);

        $this->domainRegistry->getDocumentRepository()->save($document);

        return $document;
    }

    /**
     * Publishes document
     * @param string $documentNumber
     */
    public function publish(string $documentNumber)
    {
        $documentNumber = new DocumentNumber($documentNumber);
        $document = $this->domainRegistry->getDocumentRepository()->findByNumber($documentNumber);

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