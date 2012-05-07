<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />


        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    </head>

    <body>
        <?php
        Yii::app()->bootstrap->registerTypeahead('.typeahead', array(
            'source' => array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Dakota', 'North Carolina', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'),
            'items' => 4,
            'matcher' => "js:function(item) {
        return ~item.toLowerCase().indexOf(this.query.toLowerCase());
    }",
        ));
        

        $this->widget('bootstrap.widgets.BootNavbar', array(
            
            'fixed' => 'top',
            'brand' => '<img src="' . Yii::app()->request->baseUrl . '/images/toponimo_ident_240.png" width="140">',
            'brandUrl' => 'http://www.toponimo.org/toponimo',
            'collapse' => false, // requires bootstrap-responsive.css
            'items' => array(
                '<form class="navbar-search pull-left">
                    <input type="search" class="search-query span3" 
                    placeholder="Search for places or words..." 
                    name="q" 
                    value="' . (isset($_GET["lat"]) ? CHtml::encode($_GET["lat"]) : "") . '"/>
                        </form>',
                array(
                    'class' => 'bootstrap.widgets.BootMenu',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                        array('label' => 'Word Bank','url' => '#', 'icon'=>'icon-bookmark icon-white','visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Places', 'url' => '#', 'icon'=>'icon-screenshot icon-white','visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Words', 'url' => '#', 'icon'=>'icon-book icon-white','visible' => !Yii::app()->user->isGuest),
                        '---',
                        array('label' => 'Login', 'url' => array('/user/auth'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => ucfirst(Yii::app()->user->name), 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                                array('label' => 'Profile', 'icon' => 'icon-user', 'url' => '#'),
                                '---',
                                array('label' => 'Logout', 'icon' => 'arrow-right', 'url' => array('/site/logout'))
                        )),
                    ),
                ),
            ),
        ));
        ?>

        <div id="page_title"></div>

        <div class="container" id="page">
            <div id="shadow">
                <!-- <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?> breadcrumbs -->
                <?php endif ?>

                <?php echo $content; ?>
            </div>

        </div><!-- page -->
        <div id="footer">
            &copy; Toponimo.org <?php echo date('Y'); ?><br/>

        </div><!-- footer -->

    </body>
</html>