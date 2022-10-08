<?php

namespace PhpOffice\PhpSpreadsheet\Collection;

use PhpOffice\PhpSpreadsheet\Settings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

require('./resources/PhpSpreadsheet/Settings.php');
abstract class CellsFactory
{
    /**
     * Initialise the cache storage.
     *
     * @param Worksheet $worksheet Enable cell caching for this worksheet
     *
     * @return Cells
     * */
    public static function getInstance(Worksheet $worksheet)
    {
        return new Cells($worksheet, Settings::getCache());
    }
}
