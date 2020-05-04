<?php

namespace ChurakovMike\DbDocumentor\Utils;

use ChurakovMike\DbDocumentor\Interfaces\RenderTemplateInterface;

/**
 * Class RenderTemplate.
 * @package ChurakovMike\DbDocumentor\Utils
 */
class RenderTemplate implements RenderTemplateInterface
{
    /**
     * @param string $view
     * @param array $data
     * @return array|mixed|string
     */
    public function renderView(string $view, array $data = [])
    {
        return view($view, $data)->render();
    }
}
