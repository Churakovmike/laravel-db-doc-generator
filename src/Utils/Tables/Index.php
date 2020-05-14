<?php

declare(strict_types=1);

namespace ChurakovMike\DbDocumentor\Utils\Tables;

use ChurakovMike\DbDocumentor\Interfaces\IndexInterface;
use ChurakovMike\DbDocumentor\Traits\Configurable;

/**
 * Class Index.
 * @package ChurakovMike\DbDocumentor\Utils\Tables
 *
 * @property string $name
 * @property array $columns
 */
class Index implements IndexInterface
{
    use Configurable;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var array $column
     */
    protected $columns;

    /**
     * Index constructor.
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
        return $this->name ?? 'No index name';
    }

    /**
     * @return string
     */
    public function getColumns(): string
    {
        return implode(' ', $this->columns);
    }
}
