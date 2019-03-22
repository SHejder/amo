<?php
/**
 * Created by PhpStorm.
 * User: Макс
 * Date: 020 20.03.19
 * Time: 22:54
 */

namespace src\Bilders;


abstract class Builder
{
    protected $data = ['add'];

    /**
     * @param string $name
     * @return  $this
     */
    public function addName($name)
    {
        $this->data['add'] = array(
            0 => array(
                'name' => $name
            )
        );

        return $this;
    }

    /**
     * @return  $this
     */
    public function addDate()
    {
        $this->data['add'][0]['created_at'] = time();
        return $this;
    }

    /**
     * @param integer $user
     * @return  $this
     */

    public function addUser($user)
    {
        $this->data['add'][0]['responsible_user_id'] = $user;
        return $this;
    }

    /**
     * @param string $tags
     * @return  $this
     */
    public function addTags($tags)
    {
        $this->data['add'][0]['tags'] = $tags;
        return $this;
    }


    /**
     * @param array $fields
     * @return  $this
     */

    public function addCustomFields($fields)
    {
        $i=0;
        $this->data['add'][0]['custom_fields'] = array();
        foreach ($fields as $field)
        {
            $this->data['add'][0]['custom_fields'][$i]['id'] = $field['id'];
            $this->data['add'][0]['custom_fields'][$i]['values'][0]['value'] = $field['value'];
            $i++;
        }
        return $this;
    }


    /**
     * @return array
     */
    public function getData()
    {

        return $this->data;


    }
}