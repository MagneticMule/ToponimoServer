<?php

/**
 * EFirephp enables displaying Yii logs in the FireBug console window.
 *
 * ###Requirements
 * * FireFox http://getfirefox.com
 * * FireBug (the FireFox extension) http://getfirebug.com
 * * FirePHP (the FireFox extension) http://www.firephp.org/
 *
 * ###Installation
 * * Extract the release file under `protected/extensions`
 *
 * ###Usage
 * main.php configuration file update:
 *      [...]
 *      // autoloading model and component classes
 *      'import'=>array(
 *          'application.models.*',
 *          'application.components.*',
 *                  'application.extensions.firephp.*',
 *              ),
 *              [...]
 *              'log'=>array(
 *                      'class'=>'CLogRouter',
 *                      'routes'=>array(
 *                              array(
 *                                      'class'=>'CFileLogRoute',
 *                                      'levels'=>'error, warning',
 *                              ),
 *                              array(
 *                                      'class'=>'EFirephp',
 *                                      'config'=>array(
 *                                              'enabled'=>true,
 *                                              'dateFormat'=>'Y/m/d H:i:s',
 *                                      ),
 *                                      'levels'=>'error, warning, trace, profile, info',
 *                              ),
 *                      ),
 *              ),
 *              [...]
 *
 * Now any log messages with the levels specified will be shown in the FireBug console.
 *
 * To log your own messages (can help with debugging) you can use:
 *     Yii::log('message', 'level', 'category');
 *     Yii::log('Path to file is invalid: '.$path, 'warning');
 *     Yii::log(array($variables, $to, $be, $shown, $like, $print_r, $output), 'info', 'app.SiteController.Action');
 *
 * @version 1.0
 *
 * @author scythah <scythah@gmail.com>
 * @link http://www.yiiframework.com/extension/firephp/
 */

/*
 * Output buffering is required to be able to send log data to FirePHP.
 */
ob_start();

class EFirephp extends CLogRoute
{
        /**
         * Options are:
         *   'enabled' = Whether to send logs to FireBug when running in Debug mode
         *               (logs will never be sent if Yii is not running in Debug mode)
         *   'dateFormat' = {@link http://php.net/date Format} to show the timestamp in
         * @var array config options
         */
        public $config = array(
                'enabled' => true,
                'dateFormat' => 'Y/m/d H:i:s',
        );

        /**
         * @var array the default log levels
         */
        public $report = array( 'trace'         => array(),
                                                        'info'          => array(),
                                                        'profile'       => array(),
                                                        'warning'       => array(),
                                                        'error'         => array(),
                                                        'other'         => array(),
                                                );

        /**
         * Processes log messages and sends them to FirePHP.
         * @param array list of messages.
         */
        protected function processLogs($logs)
        {
                // Check for an AJAX Requests, no point in displaying for requests that won't have a console
                if(!(Yii::app() instanceof CWebApplication) || Yii::app()->getRequest()->getIsAjaxRequest())
                {
                        return;
                }

                // Check we are running in DEBUG mode
                if (isset($config['enabled']) && (!DEFINED('YII_DEBUG') || YII_DEBUG == false))
                {
                        return;
                }

                // Loop through logs and generate report items
                foreach($logs as $item)
                {
                        $this->report = $this->assignCategories($item);
                }

                if(!empty($this->report))
                {
                        $this->sendToFirePHP($this->report);
                }
        }

        /**
         * Assigns each log item to the appropriate FirePHP category
         * @param array $item the log item
         * @return array the processed log item/s
         */
        protected function assignCategories($item)
        {
                // Do we have a message level
                if($item[1])
                {
                        $this->report[$item[1]][] = $this->formatLogMessage($item[0],$item[1],$item[2],$item[3]);
                }
                else
                {
                        $this->report['other'][] = $this->formatLogMessage($item[0],$item[1],$item[2],$item[3]);
                }

                return $this->report;
        }

        /**
         * Sends the generated reports to FirePHP for displaying.
         * @param array $reports the reports to display
         */
        protected function sendToFirePHP($reports)
        {
                $firephp = FirePHP::getInstance(true);
                // Skip some trace levels otherwise it just shows this wrapper
                $firephp->setOptions(array('LineNumbersSkipNested'=>5));
                
                foreach($reports as $level=>$logs)
                {
                        if(!empty($logs))
                        {
                                switch ($level) {
                                case 'trace':
                                        $firephp->group('Trace',array('Collapsed' => true));
                                        $firephp->trace('Click to show');
                                        break;

                                case 'info':
                                        $firephp->group('General information');
                                        foreach($logs as $log)
                                        {
                                                $firephp->info($log[0],$log[3].$log[2]);
                                        }
                                        break;

                                case 'profile':
                                        $firephp->group('Performance profile',array('Collapsed' => true));
                                        foreach($logs as $log)
                                        {
                                                $firephp->log($log[0],$log[3].$log[2]);
                                        }
                                        break;

                                case 'warning':
                                        $firephp->group('Warnings');
                                        foreach($logs as $log)
                                        {
                                                $firephp->warn($log[0],$log[3].$log[2]);
                                        }
                                        break;

                                case 'error':
                                        $firephp->group('Errors');
                                        foreach($logs as $log)
                                        {
                                                $firephp->error($log[0],$log[3].$log[2]);
                                        }
                                        break;

                                default:
                                        $firephp->group('Other');
                                        foreach($logs as $log)
                                        {
                                                $firephp->log($log[0],$log[3].$log[2]);
                                        }
                                        break;
                                }
                                $firephp->groupEnd();
                        }
                }
        }

        /**
         * Formats a log message given different fields.
         * @param string message content
         * @param integer message level
         * @param string message category
         * @param integer timestamp
         * @return array formatted message
         */
        protected function formatLogMessage($message,$level,$category,$time)
        {
                return array($message, $level, $category, @date($this->config['dateFormat'].' ',$time));
        }
}
?>