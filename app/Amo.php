<?php
/**
 * Created by PhpStorm.
 * User: Макс
 * Date: 020 20.03.19
 * Time: 20:25
 */

use src\Dispatcher\QueryDispatcher;
use src\Bilders\LeadBilder;
use src\Bilders\ContactBilder;

class Amo
{
    private $dispatcher;
    private $leadBilder;
    private $contactBilder;

    /**
     * Amo constructor.
     */
    public function __construct($subdomain)
    {
        $this->dispatcher = new QueryDispatcher();
        $this->leadBilder = new LeadBilder();
        $this->contactBilder = new ContactBilder();

        $this->dispatcher->setSubdomain($subdomain);
    }

    /**
     * @param array $data
     * @return bool
     */

    public function authorization($data)
    {
        $response = $this->dispatcher->getResponse($data, 'auth');
        if (isset($response['response']['auth'])) {
            return true;
        } else {
            echo 'Авторизация не удалась';
            die;
        }
    }

    /**
     * @param array $data
     * @return integer
     */

    public function createLead($data)
    {
        $lead = $this->leadBilder
            ->addName($data['name'])
            ->addDate()
            ->addStatus($data['status'])
            ->addUser($data['user'])
            ->addTags($data['tags'])
            ->addCustomFields($data['fields'])
            ->getData();
        $response = $this->dispatcher->getResponse($lead, 'lead');

        if (isset($response['_embedded']['items'])) {
            return $response['_embedded']['items']['id'];
        } else {
            echo "Лид не создан";
            die;
        }

    }

    public function createContact($data)
    {
        $contact = $this->contactBilder
            ->addName($data['name'])
            ->addDate()
            ->addUser($data['user'])
            ->addCreator($data['user'])
            ->addTags($data['tags'])
            ->addLead($data['lead'])
            ->addCustomFields($data['fields'])
            ->getData();
        $response = $this->dispatcher->getResponse($contact, 'contact');

        if (isset($response['_embedded']['items'])) {
            echo "Конаткт добавлен";
            return $response['_embedded']['items']['id'];
        } else {
            echo "Контакт не создан";
            die;
        }
    }

}