<?php

declare(strict_types=1);

namespace ChurakovMike\DbDocumentor\Utils\Tables;

use ChurakovMike\DbDocumentor\Interfaces\ForeignKeyInterface;
use ChurakovMike\DbDocumentor\Traits\Configurable;

/**
 * Class ForeignKey
 * @package ChurakovMike\DbDocumentor\Utils\Tables
 *
 * @property string $name
 * @property array|string[] $columnNames
 * @property string $foreignTableName
 * @property array|string[] $foreignColumns
 */
class ForeignKey implements ForeignKeyInterface
{
    use Configurable;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var array|string[]
     */
    protected $columnNames = [];

    /**
     * @var string $foreignTableName
     */
    protected $foreignTableName;

    /**
     * @var string $foreignColumns
     */
    protected $foreignColumns;

    /**
     * ForeignKey constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->loadConfig($config);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @return string
     */
    public function getForeignTableName(): string
    {
        return $this->foreignTableName;
    }

    /**
     * @return string
     */
    public function getColumnNames(): string
    {
        return implode(' ', $this->columnNames);
    }
    
    /**
     * @return string
     */
    public function getForeignColumns(): string
    {
        return implode(' ', $this->foreignColumns);
    }
}
