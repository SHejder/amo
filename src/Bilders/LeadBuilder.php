<?php
/**
 * Created by PhpStorm.
 * User: Макс
 * Date: 020 20.03.19
 * Time: 21:48
 */

namespace src\Bilders;


class LeadBuilder extends Builder
{


    /**
     * @param integer $status_id
     * @return LeadBuilder $this
     */
    public function addStatus($status_id)
    {
        $this->data['add'][0]['status_id'] = $status_id;
        return $this;

    }





}