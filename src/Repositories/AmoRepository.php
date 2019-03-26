<?php
/**
 * Created by PhpStorm.
 * User: Макс
 * Date: 020 20.03.19
 * Time: 20:25
 */

namespace src\Repositories;

use src\Clients\AmoClient;

class AmoRepository
{

    private $client;
    private $subdomain;

    /**
     * AmoRepository constructor.
     * @param string $subdomain
     */
    public function __construct($subdomain)
    {
        $this->client = new AmoClient();
        $this->subdomain = $subdomain;

    }
    /**
     * @param array $request
     * @return array
     */

    public function auth($request)
    {
        $url = 'https://' . $this->subdomain . '.amocrm.ru/private/api/auth.php?type=json';
        $response = $this->client->send($request,$url );
        return $response['response']['auth'];

    }

    /**
     * @param array $request
     * @return array
     */

    public function lead($request)
    {
        $url = 'https://' . $this->subdomain . '.amocrm.ru/api/v2/leads';
        $response = $this->client->send($request, $url );
        return $response['_embedded']['items'][0]['id'];

    }

    /**
     * @param array $request
     * @return array
     */

    public function contact($request)
    {
        $url = 'https://' . $this->subdomain . '.amocrm.ru/api/v2/contacts/';
        $response = $this->client->send($request,$url );
        return $response['_embedded']['items'];
    }

}