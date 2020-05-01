<?php

namespace ChurakovMike\DbDocumentor\Interfaces;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface ModelScannerInterface
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
     * @return array
     */
    public function getTables();
}
