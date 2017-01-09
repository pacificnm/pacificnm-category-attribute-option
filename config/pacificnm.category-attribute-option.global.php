<?php
return array(
    'module' => array(
        'CategoryAttributeOption' => array(
            'name' => 'CategoryAttributeOption',
            'version' => '1.0.0',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/category-attribute-option.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Pacificnm\CategoryAttributeOption\Controller\ConsoleController' => 'Pacificnm\CategoryAttributeOption\Controller\Factory\ConsoleControllerFactory',
            'Pacificnm\CategoryAttributeOption\Controller\CreateController' => 'Pacificnm\CategoryAttributeOption\Controller\Factory\CreateControllerFactory',
            'Pacificnm\CategoryAttributeOption\Controller\DeleteController' => 'Pacificnm\CategoryAttributeOption\Controller\Factory\DeleteControllerFactory',
            'Pacificnm\CategoryAttributeOption\Controller\IndexController' => 'Pacificnm\CategoryAttributeOption\Controller\Factory\IndexControllerFactory',
            'Pacificnm\CategoryAttributeOption\Controller\RestController' => 'Pacificnm\CategoryAttributeOption\Controller\Factory\RestControllerFactory',
            'Pacificnm\CategoryAttributeOption\Controller\UpdateController' => 'Pacificnm\CategoryAttributeOption\Controller\Factory\UpdateControllerFactory',
            'Pacificnm\CategoryAttributeOption\Controller\ViewController' => 'Pacificnm\CategoryAttributeOption\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Pacificnm\CategoryAttributeOption\Service\ServiceInterface' => 'Pacificnm\CategoryAttributeOption\Service\Factory\ServiceFactory',
            'Pacificnm\CategoryAttributeOption\Mapper\MysqlMapperInterface' => 'Pacificnm\CategoryAttributeOption\Mapper\Factory\MysqlMapperFactory',
            'Pacificnm\CategoryAttributeOption\Form\Form' => 'Pacificnm\CategoryAttributeOption\Form\Factory\FormFactory'
        )
    ),
    'router' => array(
        'routes' => array(
            'category-attribute-option-create' => array(
                'pageTitle' => 'Category Attribute Option',
                'pageSubTitle' => 'New',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-option-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/category-attribute/[:categoryAttributeId]/category-attribute-option/create',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttributeOption\Controller\CreateController',
                        'action' => 'index'
                    )
                )
            ),
            'category-attribute-option-delete' => array(
                'pageTitle' => 'Category Attribute Option',
                'pageSubTitle' => 'Delete',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-option-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/category-attribute-option/delete/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttributeOption\Controller\DeleteController',
                        'action' => 'index'
                    )
                )
            ),
            'category-attribute-option-index' => array(
                'pageTitle' => 'Category Attribute Option',
                'pageSubTitle' => 'Home',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-option-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/category-attribute-option',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttributeOption\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'category-attribute-option-rest' => array(
                'pageTitle' => 'Category Attribute Option',
                'pageSubTitle' => 'Rest',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-option-index',
                'icon' => 'fa fa-gear',
                'layout' => 'rest',
                'type' => 'segment',
                'options' => array(
                    'route' => '/api/category-attribute-option[/:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttributeOption\Controller\RestController'
                    )
                )
            ),
            'category-attribute-option-update' => array(
                'pageTitle' => 'Category Attribute Option',
                'pageSubTitle' => 'Edit',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-option-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/category-attribute-option/update/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttributeOption\Controller\UpdateController',
                        'action' => 'index'
                    )
                )
            ),
            'category-attribute-option-view' => array(
                'pageTitle' => 'Category Attribute Option',
                'pageSubTitle' => 'View',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-option-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/category-attribute-option/view/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttributeOption\Controller\ViewController',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'category-attribute-option-console-index' => array(
                    'options' => array(
                        'route' => 'category-attribute-option',
                        'defaults' => array(
                            'controller' => 'Pacificnm\CategoryAttributeOption\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'controller_map' => array(
            'Pacificnm\CategoryAttributeOption' => true
        ),
        'template_map' => array(
            'pacificnm/category-attribute-option/create/index' => __DIR__ . '/../view/category-attribute-option/create/index.phtml',
            'pacificnm/category-attribute-option/delete/index' => __DIR__ . '/../view/category-attribute-option/delete/index.phtml',
            'pacificnm/category-attribute-option/index/index' => __DIR__ . '/../view/category-attribute-option/index/index.phtml',
            'pacificnm/category-attribute-option/update/index' => __DIR__ . '/../view/category-attribute-option/update/index.phtml',
            'pacificnm/category-attribute-option/view/index' => __DIR__ . '/../view/category-attribute-option/view/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'acl' => array(
        'default' => array(
            'guest' => array(),
            'administrator' => array(
                'category-attribute-option-create',
                'category-attribute-option-delete',
                'category-attribute-option-index',
                'category-attribute-option-update',
                'category-attribute-option-view'
            )
        )
    ),
    'menu' => array(
        'default' => array()
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Admin',
                'route' => 'admin-index',
                'useRouteMatch' => true,
                'pages' => array(
                    array(
                        'label' => 'Category Attribute',
                        'route' => 'category-attribute-index',
                        'useRouteMatch' => true,
                        'pages' => array(
                            
                            array(
                                'label' => 'Category Attribute Option',
                                'route' => 'category-attribute-option-index',
                                'useRouteMatch' => true,
                                'pages' => array(
                                    array(
                                        'label' => 'View',
                                        'route' => 'category-attribute-option-view',
                                        'useRouteMatch' => true,
                                        'pages' => array(
                                            array(
                                                'label' => 'Edit',
                                                'route' => 'category-attribute-option-update',
                                                'useRouteMatch' => true
                                            ),
                                            array(
                                                'label' => 'Delete',
                                                'route' => 'category-attribute-option-delete',
                                                'useRouteMatch' => true
                                            )
                                        )
                                    ),
                                    array(
                                        'label' => 'New',
                                        'route' => 'category-attribute-option-create',
                                        'useRouteMatch' => true
                                    )
                                )
                            )
                        )
                    )
                )
                
            )
        )
    )
);