<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 08:56
 */
namespace DocFlow\Domain\Document;

/**
 * Class DocumentNumber
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class DocumentNumber
{
    /** @var string */
    private $number;

    /**
     * DocumentNumber constructor.
     * @param string $number
     */
    public function __construct(string $number)
    {
        $this->number = $number;
        if (false === $this->isValid()) {
            throw new \InvalidArgumentException("Unable to create document number with: {$number}");
        }
    }

    /**
     * Retrieves string representation
     * @return string
     */
    public function __toString()
    {
        return $this->number;
    }

    /**
     * Checks if number is valid
     * @return bool
     */
    public function isValid() : bool
    {
        return strlen($this->number) > 0;
    }
}
