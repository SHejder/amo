<?php
/**
 * Created by PhpStorm.
 * User: QA
 * Date: 22.03.2019
 * Time: 16:32
 */

namespace src\Builder;


class LeadBuilder implements BuilderInterface
{

    protected $lead;

    /**
     * @return $this
     */
    public function create()
    {
        $this->lead = new \stdClass();
        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function addName($name)
    {
        $this->create();
        $this->lead->name = $name;
        return $this;
    }

    /**
     * @return $this
     */
    public function addDate()
    {
        $this->lead->created_at = time();
        return $this;

    }

    /**
     * @param int $status_id
     * @return $this
     */
    public function addStatus($status_id)
    {
        $this->lead->status_id = $status_id;
        return $this;

    }

    /**
     * @param integer $user
     * @return $this
     */
    public function addResponsibleUser($user)
    {
        $this->lead->responsible_user_id = $user;
        return $this;

    }

    /**
     * @param string $tags
     * @return $this
     */
    public function addTags($tags)
    {
        $this->lead->tags = $tags;
        return $this;

    }

    /**
     * @param array $fields
     * @return $this
     */
    public function addCustomFields($fields)
    {
        $this->lead->custom_fields = $fields;
        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        $lead = $this->lead;
        $data['add'] = [(array)$lead];
        return $data;
    }
}