<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Controller\Factory\IndexControllerFactory;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;


return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'studentslist' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/studentslist',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'studentslist',
                    ],
                ],
            ],
            'training' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/training/:id',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'training',
                    ],
                ],
            ],
            'training_add_student' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/training/:id/students/add',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'addTrainingStudent',
                    ],
                ],
            ],
            'add_training' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/add-training',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'addTraining',
                    ],
                ],
            ],
            'student' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/student/:id',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'student',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
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
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'view_helpers' => [
        'factories' => [
            View\Helper\TrainingHelper::class => InvokableFactory::class,
        ], 'aliases'=>[
            'TrainingHelper'=> View\Helper\TrainingHelper::class
        ]
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]
];
