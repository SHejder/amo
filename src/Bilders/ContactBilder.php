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

}