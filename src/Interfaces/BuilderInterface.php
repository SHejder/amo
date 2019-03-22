<?php
/**
 * Created by PhpStorm.
 * User: QA
 * Date: 22.03.2019
 * Time: 15:49
 */


namespace src\Interfaces;

interface BuilderInterface
{
    public function create();
    public function addName($name);
    public function addDate();
    public function addResponsibleUser($user);
    public function addTags($tags);
    public function addCustomFields($field);
    public function getData();
}