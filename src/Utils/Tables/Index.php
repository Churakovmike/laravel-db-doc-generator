<?php

declare(strict_types=1);

namespace ChurakovMike\DbDocumentor\Utils\Tables;

use ChurakovMike\DbDocumentor\Interfaces\IndexInterface;
use ChurakovMike\DbDocumentor\Traits\Configurable;

/**
 * Class Index
 * @package ChurakovMike\DbDocumentor\Utils\Tables
 */
class Index implements IndexInterface
{
    use Configurable;

    /**
     * Index constructor.
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
