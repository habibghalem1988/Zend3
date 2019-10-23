<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class TrainingHelper extends AbstractHelper
{
    public function getStatus(\DateTime $start_date, \DateTime $end_date){
        $status='not_started';
        $now = new \Datetime();

        if($end_date>=$now && $now>=$start_date)
            $status = ' In Progress';
        else {
            if($now>$end_date) $status=' Finished';
            if($now<$start_date) $status=' Not Started Yet';
        }
        return $status;
    }
}