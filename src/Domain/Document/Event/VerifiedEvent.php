<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 21.09.16
 * Time: 14:24
 */
namespace DocFlow\Domain\Document\Event;

use DocFlow\Domain\Document\DocumentEvent;

/**
 * Class VerifiedEvent
 * @package DocFlow\Domain\Document\Event
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class VerifiedEvent extends DocumentEvent
{
    const NAME = 'document.verified';
}
