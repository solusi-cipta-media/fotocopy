<?php

declare(strict_types=1);

namespace ZipStream\Option;


use MyCLabs\Enum\Enum;

require('./resources/PhpSpreadsheet/ZipStream/Option/Enum.php');

/**
 * Methods enum
 *
 * @method static STORE(): Method
 * @method static DEFLATE(): Method
 * @psalm-immutable
 */
class Method extends Enum
{
    const STORE = 0x00;
    const DEFLATE = 0x08;
}
