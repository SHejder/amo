<?php
/**
 * Created by PhpStorm.
 * User: QA
 * Date: 26.03.2019
 * Time: 10:18
 */

namespace src\Factories;


use src\Builders\ContactBuilder;
use src\Builders\Director;
use src\Builders\LeadBuilder;
use src\Entities\User;
use src\Interfaces\RequestFactoryInterface;

class RequestRequestFactory implements RequestFactoryInterface
{
    private $director;

    public function __construct()
    {
        $this->director = new Director();
    }



    /**
     * @param User $user
     * @return array
     */
    public function createAuthRequest($user)
    {
        $request = [
            'USER_LOGIN' => $user->getName(),
            'USER_HASH' => $user->getHash()
        ];

        return $request;
    }


    /**
     * @param array $data
     * @return array
     */
    public function createLeadRequest($data)
    {
        $builder = new LeadBuilder();
        $this->director->setBuilder($builder);

        $request = $builder
            ->addName($data['name'])
            ->addDate()
            ->addStatus($data['status'])
            ->addResponsibleUser($data['responsible_user_id'])
            ->addTags($data['tags'])
            ->addCustomFields($data['fields'])
            ->getData();

        return $request;
    }


    /**
     * @param array $data
     * @return array
     */
    public function createContactRequest($data)
    {
        $builder = new ContactBuilder();
        $this->director->setBuilder($builder);

        $request = $builder
            ->addName($data['name'])
            ->addDate()
            ->addResponsibleUser($data['responsible_user_id'])
            ->addCreator($data['responsible_user_id'])
            ->addTags($data['tags'])
            ->addLead($data['lead'])
            ->addPhone($data['phone'])
            ->getData();

        return $request;

    }
}