<?php
/**
 * Created by PhpStorm.
 * User: Макс
 * Date: 020 20.03.19
 * Time: 23:12
 */

namespace src\Builder;



class ContactBuilder implements BuilderInterface
{
    
    
    protected $contact;


    /**
     * @return $this
     */
    public function create()
    {
        $this->contact = new \stdClass();
        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function addName($name)
    {
        $this->create();
        $this->contact->name = $name;
        return $this;
    }

    /**
     * @return $this
     */
    public function addDate()
    {
        $this->contact->created_at = time();
        return $this;

    }

    /**
     * @param integer $user
     * @return $this
     */
    public function addResponsibleUser($user)
    {
        $this->contact->responsible_user_id = $user;
        return $this;

    }

    /**
     * @param string $tags
     * @return $this
     */
    public function addTags($tags)
    {
        $this->contact->tags = $tags;
        return $this;

    }

    /**
     * @param array $fields
     * @return $this
     */
    public function addCustomFields($fields)
    {
        $this->contact->custom_fields = $fields;
        return $this;
    }


    
    
    /**
     * @param array $leads
     * @return ContactBuilder $this
     */
    public function addLead($leads)
    {
        $this->contact->leads_id = $leads;
        return $this;
    }

    /**
     * @param integer $user
     * @return ContactBuilder $this
     */

    public function addCreator($user)
    {
        $this->contact->created_by = $user;
        return $this;
    }

    /**
     * @param array $phone
     * @return ContactBuilder $this
     */

    public function addPhone($phone)
    {
        $this->contact->custom_fields = $phone;
        return $this;
    }


    /**
     * @return array
     */
    public function getData()
    {
        $contact = $this->contact;
        $data['add'] = [(array)$contact];
        return $data;
    }

}