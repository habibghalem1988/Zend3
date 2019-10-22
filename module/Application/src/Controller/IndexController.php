<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $start_date= new \DateTime('2019-10-22');
        $end_date= new \DateTime('2019-10-25');




        $duration = $end_date->diff($start_date)->days+1;
        $intro=['title'=>'Zend Framework 3',
            'desc'=>'Formation Zend Framework 3 au niveau de Smile',
            'students'=>"Number of students : 2",
            'duration'=>$duration,
            'start_date'=>$start_date,
            'end_date'=>$end_date];
        return new ViewModel(['intro'=>$intro]);
    }
    public function newTrainingAction(){
        $start_date= new \DateTime('2019-10-16');
        $end_date= new \DateTime('2019-10-21');
        $duration = $end_date->diff($start_date)->days+1;
        $intro=['title'=>'Angular 6',
            'desc'=>'Formation Angular',
            'students'=>"Number of students : 2",
            'duration'=>$duration,
            'start_date'=>$start_date,
            'end_date'=>$end_date];
        return new ViewModel(['intro'=>$intro]);
    }
}
