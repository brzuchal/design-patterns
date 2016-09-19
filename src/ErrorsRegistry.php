<?php
namespace DocFlow;
use LogicException;

/**
 * Class ErrorsRegistry
 * @package DocFlow
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class ErrorsRegistry
{
    /**
     * @var self Holds instance
     */
    private static $instance;

    /**
     * ErrorsRegistry constructor.
     */
    final protected function __construct()
    {

    }

    /**
     * @return ErrorsRegistry
     */
    public static function getInstance() : self
    {
        if (self::$instance instanceof self) {
            return self::$instance;
        }

        return self::$instance = new self();
    }

    public function log(string $message, string $classname)
    {
        // TODO: write logic here
    }

    /**
     * @throws LogicException
     */
    final protected function __clone()
    {
        throw new LogicException("ErrorsRegistry cannot be cloned");
    }

    /**
     * @throws LogicException
     */
    function __wakeup()
    {
        throw new LogicException("ErrorsRegistry cannot be unserialized");
    }
}
