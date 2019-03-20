<?php
/**
 * Created by PhpStorm.
 * User: Макс
 * Date: 020 20.03.19
 * Time: 21:48
 */

namespace src\Bilders;


class LeadBilder extends Bilder
{


    /**
     * @param integer $status_id
     * @return LeadBilder $this
     */
    public function addStatus($status_id)
    {
        $this->data['add'][0]['status_id'] = $status_id;
        return $this;

    }





}