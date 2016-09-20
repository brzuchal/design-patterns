<?php
/**
 * Created by PhpStorm.
 * User: mbrzuchalski
 * Date: 20.09.16
 * Time: 08:58
 */
namespace DocFlow\Domain\Document;

use Esky\Enum\Enum;

/**
 * Class DocumentType
 * @package DocFlow\Domain\Document
 * @author Michał Brzuchalski <m.brzuchalski@madkom.pl>
 */
class DocumentType extends Enum
{
    const QUALITY_BOOK = 1;
    const PROCEDURE_BOOK = 2;
    const INSTRUCTION = 3;
}
