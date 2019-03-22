<?php
/**
 * Created by PhpStorm.
 * User: QA
 * Date: 22.03.2019
 * Time: 18:07
 */

namespace src\Builders;


class Director
{
    private $builder;

    /**
     * @param  $builder
     */
    public function setBuilder($builder)
    {
        $this->builder = $builder;
    }
}