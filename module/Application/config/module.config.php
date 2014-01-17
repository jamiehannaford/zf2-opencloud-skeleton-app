<?php

return array(
    'router'          => array(
        'routes' => array(
            'home'        => array(
                'type'    => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),

            'servers'     => array(
                'type'    => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/servers',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Servers',
                        'action'        => 'index',
                    ),
                )
            ),

            'cloud-files' => array(
                'type'          => 'Literal',
                'options'       => array(
                    'route'    => '/cloud-files',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'CloudFiles',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes'  => array(
                    'container' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/container/:name',
                            'defaults' => array(
                                'controller' => 'Application\Controller\CloudFiles',
                                'action'     => 'container',
                            )
                        )
                    ),
                    'file'      => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/container[/:container]/file/:name',
                            'defaults' => array(
                                'controller' => 'Application\Controller\CloudFiles',
                                'action'     => 'file',
                            )
                        )
                    )
                )
            ),

            'databases'   => array(
                'type'    => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/databases',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Databases',
                        'action'        => 'index',
                    ),
                )
            ),

        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases'            => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator'      => array(
        'locale'                    => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers'     => array(
        'invokables' => array(
            'Application\Controller\Index'      => 'Application\Controller\IndexController',
            'Application\Controller\Servers'    => 'Application\Controller\ServersController',
            'Application\Controller\CloudFiles' => 'Application\Controller\CloudFilesController',
            'Application\Controller\Databases'  => 'Application\Controller\DatabasesController'
        ),
    ),
    'view_manager'    => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map'             => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack'      => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console'         => array(
        'router' => array(
            'routes' => array(),
        ),
    ),
);
