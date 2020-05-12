<?php

declare(strict_types=1);

namespace ChurakovMike\DbDocumentor\Utils;

use ChurakovMike\DbDocumentor\Interfaces\ColumnInterface;
use ChurakovMike\DbDocumentor\Traits\Configurable;

/**
 * Class Column.
 * @package ChurakovMike\DbDocumentor\Utils
 *
 * @property string $name
 * @property string $type
 * @property string $comment
 * @property string $autoincrement
 * @property string $unsigned
 * @property string $definition
 * @property string $defaultValue
 * @property string $fixed
 * @property string $isNotNull
 * @property string $precision
 * @property string $scale
 * @property string $length
 * @property string $options
 */
class Column implements ColumnInterface
{
    use Configurable;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $type
     */
    protected $type;

    /**
     * @var string $comment
     */
    protected $comment;

    /**
     * @var string $autoincrement
     */
    protected $autoincrement;

    /**
     * @var string $unsigned
     */
    protected $unsigned;

    /**
     * @var string $definition
     */
    protected $definition;

    /**
     * @var string $defaultValue
     */
    protected $defaultValue;

    /**
     * @var string $fixed
     */
    protected $fixed;

    /**
     * @var string $isNotNull
     */
    protected $isNotNull;

    /**
     * @var string $precision
     */
    protected $precision;

    /**
     * @var string $scale
     */
    protected $scale;

    /**
     * @var string $length
     */
    protected $length;

    /**
     * @var string $options
     */
    protected $options;

    /**
     * Column constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->loadConfig($config);
    }

    /**
     * @return mixed|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed|string
     */
    public function getType()
    {
        if (empty($this->length)) {
            return $this->type;
        }

        return "{$this->type}({$this->length})";
    }

    /**
     * @return mixed|string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return mixed|string
     */
    public function getOptions()
    {
        return $this->type;
    }

    /**
     * @return mixed|string
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * @return mixed|string
     */
    public function getIsNull()
    {
        return $this->isNotNull ? 'True' : 'False';
    }
}
