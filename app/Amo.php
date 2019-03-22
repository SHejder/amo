<?php
/**
 * Created by PhpStorm.
 * User: Макс
 * Date: 020 20.03.19
 * Time: 20:25
 */

namespace app;

use src\Builders\Director;
use src\Builders\LeadBuilder;
use src\Builders\ContactBuilder;
use src\Dispatcher\QueryDispatcher;

class Amo
{

    private $dispatcher;
    private $director;

    /**
     * Amo constructor.
     * @param string $subdomain
     */
    public function __construct($subdomain)
    {
        $this->dispatcher = new QueryDispatcher();
        $this->director= new Director();

        $this->dispatcher->setSubdomain($subdomain);
    }

    /**
     * @param array $data
     * @return bool
     */

    public function authorization($data)
    {

        $response = $this->dispatcher->getResponse($data, 'auth');
        if (isset($response['response']['auth']))
        {
            echo 'Успешная авторизация';
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
        $builder = new LeadBuilder();
        $this->director->setBuilder($builder);

        $lead = $builder
            ->addName($data['name'])
            ->addDate()
            ->addStatus($data['status'])
            ->addResponsibleUser($data['user'])
            ->addTags($data['tags'])
            ->addCustomFields($data['fields'])
            ->getData();
        $response = $this->dispatcher->getResponse($lead, 'lead');

        if (isset($response['_embedded']['items'])) {
            return $response['_embedded']['items'][0]['id'];
        } else {
            echo "Лид не создан";
            die;
        }

    }

    /**
     * @param array $data
     * @return integer
     */

    public function createContact($data)
    {
        $builder = new ContactBuilder();
        $this->director->setBuilder($builder);

        $contact = $builder
            ->addName($data['name'])
            ->addDate()
            ->addResponsibleUser($data['user'])
            ->addCreator($data['user'])
            ->addTags($data['tags'])
            ->addLead($data['lead'])
            ->addPhone($data['phone'])
            ->getData();
        $response = $this->dispatcher->getResponse($contact, 'contact');

        if (isset($response['_embedded']['items'])) {
            echo "Конаткт добавлен";
            return $response['_embedded']['items'][0]['id'];
        } else {
            echo "Контакт не создан";
            die;
        }
    }

}