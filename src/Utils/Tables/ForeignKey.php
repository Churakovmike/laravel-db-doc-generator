<?php

declare(strict_types=1);

namespace ChurakovMike\DbDocumentor\Utils\Tables;

use ChurakovMike\DbDocumentor\Interfaces\ForeignKeyInterface;
use ChurakovMike\DbDocumentor\Traits\Configurable;

/**
 * Class ForeignKey
 * @package ChurakovMike\DbDocumentor\Utils\Tables
 */
class ForeignKey implements ForeignKeyInterface
{
    use Configurable;

    /**
     * ForeignKey constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->loadConfig($config);
    }

    public function getName()
    {
        // TODO: Implement getName() method.
    }
}
