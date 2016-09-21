<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 21.09.16
 * Time: 11:28
 */
namespace DocFlow\Domain\Document\State;

use DocFlow\Domain\Document\DocumentState;

/**
 * Class PublishedState
 * @package DocFlow\Domain\Document\State
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class PublishedState extends DocumentState
{
    public function verify() : DocumentState
    {
        return new VerifiedState($this->document);
    }

    public function draft() : DocumentState
    {
        return new DraftState($this->document);
    }
}
