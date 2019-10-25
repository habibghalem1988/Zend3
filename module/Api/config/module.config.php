<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApi for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Api;

use Api\Controller\Factory\IndexControllerFactory;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
return [
    'router' => [
        'routes' => [
            'home_api' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/api',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'studentslist_api' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/api/studentslist',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'studentslist',
                    ],
                ],
            ],
            'training_api' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/api/training/:id',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'training',
                    ],
                ],
            ],
            'student_api' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/api/student/:id',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'student',
                    ],
                ],
            ],
            'api' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/api[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => array(
            Controller\IndexController::class => IndexControllerFactory::class,
        ),
    ],
    'view_manager' => [

        'strategies' => [
            'ViewJsonStrategy',
        ],
    ]
];
