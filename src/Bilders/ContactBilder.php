<?php
/**
 * Created by PhpStorm.
 * User: Макс
 * Date: 020 20.03.19
 * Time: 23:12
 */

namespace src\Bilders;


class ContactBilder extends Bilder
{
    /**
     * @param string $lead
     * @return ContactBilder $this
     */
    public function addLead($lead)
    {
        $this->data['add'][0]['leads_id'] = array(
            $lead
        );
        return $this;
    }

    /**
     * @param integer $user
     * @return ContactBilder $this
     */

    public function addCreator($user)
    {
        $this->data['add'][0]['created_by'] = $user;
        return $this;
    }

    /**
     * @param array $fields
     * @return ContactBilder $this
     */

    public function addPhone($fields)
    {
        $i=0;
        $this->data['add'][0]['custom_fields'] = array();
        foreach ($fields as $field)
        {
            $this->data['add'][0]['custom_fields'][$i]['id'] = $field['id'];
            $this->data['add'][0]['custom_fields'][$i]['values'][0]['value'] = $field['value'];
            $this->data['add'][0]['custom_fields'][$i]['values'][0]['enum'] = $field['enum'];
            $i++;
        }

        return $this;
    }

}