<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Toponimo',
    'theme' => 'classic',
    // preloading 'log' & 'bootstrap' components
    'preload' => array('log', 'bootstrap'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.user.models.*',
        'application.extlibs.*',
        'application.extensions.firephp.*',
    ),
    'modules' => array(
        'avatar' => array(),
        'user' => array(
            'debug' => false,
            'userTable' => 'user',
            'translationTable' => 'translation',
        ),
        'usergroup' => array(
            'usergroupTable' => 'user_group',
            'usergroupMessagesTable' => 'user_group_message',
        ),
        'membership' => array(
            'membershipTable' => 'membership',
            'paymentTable' => 'payment',
        ),
        'friendship' => array(
            'friendshipTable' => 'friendship',
        ),
        'profile' => array(
            'privacySettingTable' => 'privacysetting',
            'profileFieldTable' => 'profile_field',
            'profileTable' => 'profile',
            'profileCommentTable' => 'profile_comment',
            'profileVisitTable' => 'profile_visit',
        ),
        'role' => array(
            'roleTable' => 'role',
            'userRoleTable' => 'user_role',
            'actionTable' => 'action',
            'permissionTable' => 'permission',
        ),
        'message' => array(
            'messageTable' => 'message',
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'Lennon1974!',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '80.3.101.*'),
            'generatorPaths' => array(
                'bootstrap.gii', // since 0.9.1
            ),
        ),
    ),
    // application components
    'components' => array(
        'clientScript' => array(
            'packages' => array(
                'jquery' => array(
                    'baseUrl' => Yii::app()->request->baseUrl . 'js/',
                    'js' => array('jquery.js')))),
        'user' => array(
            'class' => 'application.modules.user.components.YumWebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('//user/user/login'),
        ),
        'cache' => array('class' => 'system.caching.CFileCache'),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => false,
            'rules' => array(
                'word/<id:\d+>/<title:.*?>' => 'word/view',
                'words/<tag:.*?>' => 'word/index',
                'wordnetword/<id:\d+>/<title:.*?>' => 'wordnetword/view',
                'wordnetwords/<tag:.*?>' => 'wordnetword/index',
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
            'tablePrefix' => '',
        ),
        'dbwordnet' => array(
            'connectionString' => 'mysql:host=localhost;dbname=toponimo_wordnet',
            'emulatePrepare' => true,
            'username' => 'toponimo_admin',
            'password' => 'Lennon1974!',
            'charset' => 'utf8',
            'class' => 'CDbConnection',
            'tablePrefix' => '',
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
                array(
                    'class' => 'EFirephp',
                    'config' => array(
                        'enabled' => true,
                        'dateFormat' => 'Y/m/d H:i:s',
                    ),
                    'levels' => 'error, warning, trace, profile, info',
                ),
            // uncomment the following to show log messages on web pages
            /*  array(
              'class'=>'CWebLogRoute',
              ),* */
            ),
        ),
        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params' => array(
            // this is used in contact page
            'adminEmail' => 'toponimo@toponimo.org',
        ),
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
        ),
    ),
);
?>
