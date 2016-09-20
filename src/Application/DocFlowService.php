<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 09:02
 */
namespace DocFlow\Application;
use DocFlow\Domain\Document\DocumentRepository;
use DocFlow\Domain\UserRepository;

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


    public function create()
    {
        
    }
    
    public function change()
    {
        
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