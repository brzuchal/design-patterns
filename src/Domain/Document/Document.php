<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 08:56
 */
namespace DocFlow\Domain\Document;
use DocFlow\Domain\User;

/**
 * Class Document
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class Document
{
    /** @var DocumentStatus */
    private $status;
    /** @var DocumentType */
    private $type;
    /** @var DocumentNumber */
    private $number;
    /** @var User */
    private $author;

    /**
     * Document constructor.
     * @param DocumentType $type
     * @param User $author
     */
    public function __construct(DocumentType $type, User $author)
    {
        $this->status = DocumentStatus::DRAFT();
        $this->type = $type;
        $this->author = $author;
        $this->number = new DocumentNumber(date('Y-m-d'));
    }

    /**
     * @return DocumentNumber
     */
    public function getNumber() : DocumentNumber
    {
        return $this->number;
    }

    /**
     * @return User
     */
    public function getAuthor() : User
    {
        return $this->author;
    }
}
