<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class TrainingHelper extends AbstractHelper
{
    public function getStatus(\DateTime $start_date, \DateTime $end_date){
        $status='not_started';
        $now = new \Datetime('2019-10-22');

        if($end_date>=$now && $now>=$start_date)
            $status = 'in_progress';
        else {
            if($now>$end_date) $status='finished';
            if($now<$start_date) $status='not_started';
        }
        return $status;
    }
}