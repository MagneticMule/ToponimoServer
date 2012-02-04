<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Toponimo',
    'theme' => 'classic',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.user.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.extlibs.*'
    ),
    'modules' => array(
        'user' => array(
            'tableUsers' => 'tbl_users',
            'tableProfiles' => 'tbl_profiles',
            'tableProfileFields' => 'tbl_profiles_fields',
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'Lennon1974!',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '80.3.101.*'),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('/user/login'),
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => false,
            'rules' => array(
                'word/<id:\d+>/<title:.*?>' => 'word/view',
                'words/<tag:.*?>' => 'word/index',
                'place/<id:\d+>/<title:.*?>' => 'place/view',
                'places/<tag:.*?>' => 'place/index',
                'image/<id:\d+>/<title:.*?>' => 'image/view',
                'images/<tag:.*?>' => 'image/index',
                     
                //api             
                array('auth/login', 'pattern' => 'auth/<model:\w+>', 'verb' => 'POST'),
                array('api/list', 'pattern' => 'api/<model:\w+>', 'verb' => 'GET'),
                array('api/view', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'GET'), 
                array('api/update', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'PUT'),
                array('api/delete', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'DELETE'),
                array('api/create', 'pattern' => 'api/<model:\w+>', 'verb' => 'POST'),
                'site/page/<view:\w+>' => 'site/page',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=toponimo_placename',
            'emulatePrepare' => true,
            'username' => 'toponimo_admin',
            'password' => 'Lennon1974!',
            'charset' => 'utf8',
        ),
        'dbwordnet' => array(
            'connectionString' => 'mysql:host=localhost;dbname=toponimo_wordnet',
            'emulatePrepare' => true,
            'username' => 'toponimo_admin',
            'password' => 'Lennon1974!',
            'charset' => 'utf8',
            'class' => 'CDbConnection'
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*  array(
              'class'=>'CWebLogRoute',
              ),* */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'toponimo@toponimo.org',
    ),
);
?>
