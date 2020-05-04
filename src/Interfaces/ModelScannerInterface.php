<?php

namespace ChurakovMike\DbDocumentor\Interfaces;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface ModelScannerInterface.
 */
interface ModelScannerInterface
{
    /**
     * @param Model $model
     *
     * @return ViewPresenterInterface
     */
    public function getDataFromModel(Model $model);

    /**
     * @param string $table
     * @return ViewPresenterInterface
     */
    public function getDataFromTable(string $table);

    /**
     * @return array
     */
    public function getTables();

    /**
     * @return array
     */
    public function getTablesWithoutModel();
}
