<?php

namespace ChurakovMike\DbDocumentor\Utils;

use ChurakovMike\DbDocumentor\Interfaces\ViewPresenterInterface;

/**
 * Class ViewPresenter
 * @package ChurakovMike\DbDocumentor\Utils
 *
 * @property string $tableName;
 */
class ViewPresenter implements ViewPresenterInterface
{
    /**
     * @var string $tableName
     */
    protected $tableName;

    protected $columns;

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * @param string $name
     * @return mixed|void
     */
    public function setTableName(string $name)
    {
        $this->tableName = $name;
    }

    public function getColumns()
    {
        // TODO: Implement getColumns() method.
    }
}
