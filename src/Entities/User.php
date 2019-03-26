<?php
/**
 * Created by PhpStorm.
 * User: QA
 * Date: 26.03.2019
 * Time: 10:38
 */

namespace src\Entities;


class User
{
    private $name;
    private $hash;


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param mixed $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

}
