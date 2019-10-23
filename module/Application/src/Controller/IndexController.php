<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Entity\Training;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        $training = new Training();
        $training->setStartDate(new \DateTime('2019-10-22'));
        $training->setEndDate(new \DateTime('2019-10-25'));
        $training->setStudentsNbr(2);
        $training->setTitle('Zend Framework3');
        $training->setDescription('Paris Smile Zend3 Training');
        return new ViewModel(['training'=>$training]);
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
