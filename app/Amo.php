<?php
/**
 * Created by PhpStorm.
 * User: QA
 * Date: 26.03.2019
 * Time: 11:48
 */

namespace app;


use src\Entity\User;
use src\Factory\RequestFactory;
use src\Repository\AmoRepository;

class Amo
{

    private $requestFactory;
    private $user;
    private $amoRepository;

    /**
     * Amo constructor.
     * @param string $subdomain
     */
    public function __construct($subdomain)
    {
        $this->requestFactory = new RequestFactory();
        $this->user = new User();
        $this->amoRepository = new AmoRepository($subdomain);
    }

    /**
     * @return array
     */
    public function authUser()
    {
        $request = $this->requestFactory->createAuthRequest($this->user);
        return $this->amoRepository->auth($request);
    }

    /**
     * @param string name
     * @param string $hash
     * @return $this
     */
    public function createUser($name, $hash)
    {
        $user = $this->user;
        $user->setName($name);
        $user->setHash($hash);
        return $this;
    }

    /**
     * @param array $data
     * @return array
     */
    public function createLead($data)
    {
        $request = $this->requestFactory->createLeadRequest($data);
        return $this->amoRepository->lead($request);
    }

    public function createContact($data)
    {
        $request = $this->requestFactory->createContactRequest($data);
        return $this->amoRepository->contact($request);
    }

}