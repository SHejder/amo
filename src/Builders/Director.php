<?php
/**
 * Created by PhpStorm.
 * User: QA
 * Date: 22.03.2019
 * Time: 18:07
 */

namespace src\Builders;


use src\Interfaces\BuilderInterface;

class Director
{
    private $builder;

    /**
     * @param  $builder
     */
    public function setBuilder($builder)
    {
        if($builder instanceof BuilderInterface)
        {
            $this->builder = $builder;
        }
    }
}