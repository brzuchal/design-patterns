<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 08:58
 */
namespace DocFlow\Domain\Document;

use Esky\Enum\Enum;

/**
 * Class DocumentStatus
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class DocumentStatus extends Enum
{
    const DRAFT = 1;
    const VERIFIED = 2;
    const PUBLISHED = 3;
    const ARCHIVED = 4;
}
