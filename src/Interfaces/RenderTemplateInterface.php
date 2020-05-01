<?php

namespace ChurakovMike\DbDocumentor\Interfaces;

/**
 * Interface FileAccess
 */
interface RenderTemplateInterface
{
    /**
     * @param string $view
     * @param array $data
     *
     * @return mixed
     */
    public function renderView(string $view, array $data = []);
}
