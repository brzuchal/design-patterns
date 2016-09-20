<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 09:01
 */
namespace DocFlow\Domain\User;

/**
 * Class User
 * @package DocFlow\Domain
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class User
{
    /** @var string */
    private $name;

    /**
     * User constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Retrieves user name
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
}
