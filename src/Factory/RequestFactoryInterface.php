<?php
/**
 * Created by PhpStorm.
 * User: QA
 * Date: 26.03.2019
 * Time: 9:57
 */

namespace src\Factory;


interface RequestFactoryInterface
{
    public function createAuthRequest($data);

    public function createLeadRequest($data);

    public function createContactRequest($data);
}