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

    }
    public  function trainingAction(){
        $id = $this->params()->fromRoute('id');
        $training = $this->entityManager->getRepository(Training::class)->find($id);
        return new ViewModel(['training'=>$training]);
    }
}
