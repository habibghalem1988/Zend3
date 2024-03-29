<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Entity\Student;
use Application\Entity\Training;
use Application\Form\TrainingForm;
use Doctrine\ORM\EntityNotFoundException;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Hydrator\Reflection;
use Zend\Hydrator\Strategy\DateTimeFormatterStrategy;
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
        $students_list = $this->entityManager->getRepository(Student::class)->findAll();
        return new ViewModel(['students_list'=>$students_list]);
    }




    public function addTrainingStudentAction(){
        $id = $this->params()->fromRoute('id');
        echo $id;

        $training = $this->entityManager->getRepository(Training::class)->find($id);



    }





    public function addTrainingAction(){
        $form = new TrainingForm();

        if($this->getRequest()->isPost())
        {
            // Fill in the form with POST data
            $data = $this->params()->fromPost();
            $form->setData($data);
            if($form->isValid()){

                $data = $form->getData();
                $training = new Training();
                //$training->setTitle($data[]);
                $hydrator = new Reflection();
                $hydrator->hydrate($data, $training);

                $training->setEndDate(new \DateTime($data['end_date']));
                $training->setStartDate(new \DateTime($data['start_date']));


                $this->entityManager->persist($training);
                $this->entityManager->flush();

            }


        }

        return new ViewModel([
            'form' => $form
        ]);
    }
}
