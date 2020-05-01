<?php

namespace ChurakovMike\DbDocumentor\Interfaces;

/**
 * Interface ColumnInterface
 * @package ChurakovMike\DbDocumentor\Interfaces
 */
interface ColumnInterface
{
    /**
     * Column name from database.
     *
     * @return mixed
     */
    public function getName();

    /**
     * Column type from database.
     *
     * @return mixed
     */
    public function getType();

    /**
     * Comment from database and comment from related eloquent model.
     *
     * @return mixed
     */
    public function getComment();

    /**
     * Column options from database such as autoincrement, primary_key, unique and etc.
     *
     * @return mixed
     */
    public function getOptions();
}
