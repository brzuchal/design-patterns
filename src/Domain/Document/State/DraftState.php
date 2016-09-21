<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 21.09.16
 * Time: 10:40
 */
namespace DocFlow\Domain\Document\State;

use DocFlow\Domain\Document\Document;
use DocFlow\Domain\Document\DocumentState;
use DocFlow\Domain\Document\DocumentValidator;

/**
 * Class DraftState
 * @package DocFlow\Domain\Document\State
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class DraftState extends DocumentState
{
    public function verify() : DocumentState
    {
        return new VerifiedState($this->document);
    }
}
