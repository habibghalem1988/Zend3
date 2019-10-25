<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApi for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Api\Controller;

use Application\Entity\Student;
use Application\Entity\Training;
use Doctrine\ORM\EntityNotFoundException;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Zend\Serializer\Serializer;
class IndexController extends AbstractActionController
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;
    public function __construct( $entityManager)
    {

        $this->entityManager = $entityManager;
    }
    public function indexAction()
    {
        $trainings = $this->entityManager->getRepository(Training::class)->findAll();
        $students_list = $this->entityManager->getRepository(Student::class)->findAll();
        return new ViewModel(['trainings'=>$trainings,'student_list'=>$students_list]);
    }
    public  function trainingAction(){
        $id = $this->params()->fromRoute('id');
        $training = $this->entityManager->getRepository(Training::class)->find($id);
        if(empty($training)){
            throw new EntityNotFoundException('Training Not Found');
        }
        return new ViewModel(['training'=>$training]);
    }

    public  function studentAction(){
        $id = $this->params()->fromRoute('id');
        $student = $this->entityManager->getRepository(Student::class)->find($id);
        if(empty($student)){
            throw new EntityNotFoundException('Student Not Found');
        }
        return new ViewModel(['student'=>$student]);
    }

    public  function studentslistAction(){
        $event =$this->getEvent();
        $response = $event->getResponse();
        $response->setStatusCode(200);
        $students_list = $this->entityManager->getRepository(Student::class)->findAll();
        $students = array();
        foreach ($students_list  as $student){
            $student = ['FirstName'=>$student->getFirstName(),
                'LastName'=>$student->getLastName(),
                'BirthDay'=>$student->getBirthDay(),
                'Class'=>$student->getClass()];
            array_push($students,$student);
        }




        return new JsonModel([
            'status' => 'SUCCESS',
            'message'=>'Here is your data',
            'data' => [
                'students list' => $students,

            ]
        ]);
    }
}
