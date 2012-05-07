<?php
if (!isset($model))
    $model = new YumUserLogin();

$module = Yum::module();

$this->pageTitle = Yum::t('Login');
if (isset($this->title))
    $this->title = Yum::t('<h1>Login</h1>');
// $this->breadcrumbs = array(Yum::t('Login'));

Yum::renderFlash();
?>

<div class="form">
<?php
 
/*$this->beginWidget('CActiveForm', array(
                        'id'=>'registration-form',
                        'action' => 'index.php?r=registration',
                        'enableAjaxValidation'=>true,
                        'focus'=>array($form,'username'),
                        ));
 
 */

 /*  $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
                        'id'=>'form',
                        'action' => '//user/auth/login',
                        'enableAjaxValidation'=>true,
                        'focus'=>array($form,'username'),
                        ));
  * 
  * 
  */
?>
   
   <?php echo CHtml::beginForm(array('//user/auth/login'));  ?>

   


    <?php
    if (isset($_GET['action']))
        echo CHtml::hiddenField('returnUrl', urldecode($_GET['action']));
    ?>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">


        <?php
        //   if ($module->loginType & UserModule::LOGIN_BY_USERNAME
        //           || $module->loginType & UserModule::LOGIN_BY_LDAP)
        //       echo CHtml::activeLabelEx($model, 'username');
        if ($module->loginType & UserModule::LOGIN_BY_EMAIL)
            printf('<label for="YumUserLogin_username">%s <span class="required">*</span></label>', Yum::t('Email or Username'));
        //    if ($module->loginType & UserModule::LOGIN_BY_OPENID)
        //        printf('<label for="YumUserLogin_username">%s <span class="required">*</span></label>', Yum::t('OpenID username'));
        ?>



        <?php echo CHtml::activeTextField($model, 'username') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabelEx($model, 'password'); ?>
        <?php
        echo CHtml::activePasswordField($model, 'password');
        if ($module->loginType & UserModule::LOGIN_BY_OPENID)
            echo '<br />' . Yum::t('When logging in with OpenID, password can be omitted');
        ?>

    </div>

    <div class="row">
        <p class="hint">
            <?php
            if (Yum::hasModule('registration') && Yum::module('registration')->enableRegistration)
                echo CHtml::link(Yum::t("Registration"), Yum::module('registration')->registrationUrl);
            if (Yum::hasModule('registration')
                    && Yum::module('registration')->enableRegistration
                    && Yum::module('registration')->enableRecovery)
                echo ' | ';
            if (Yum::hasModule('registration')
                    && Yum::module('registration')->enableRecovery)
                echo CHtml::link(Yum::t("Lost password?"), Yum::module('registration')->recoveryUrl);
            ?>
        </p>
    </div>

    <div class="row rememberMe">
        <?php echo CHtml::activeCheckBox($model, 'rememberMe', array('style' => 'display: inline;')); ?>
        <?php echo CHtml::activeLabelEx($model, 'rememberMe', array('style' => 'display: inline;')); ?>
    </div>

    <div class="row submit">
        <?php $this->widget('bootstrap.widgets.BootButton', array('buttonType' => 'submit','type'=>'primary', 'icon' => 'ok', 'label' => 'Login')); ?>
    </div>


    <?php 
    
    echo CHtml::endForm();
    
    
    
    ?>
</div><!-- form -->

<?php
$form = new CForm(array(
            'elements' => array(
                'username' => array(
                    'type' => 'text',
                    'maxlength' => 32,
                ),
                'password' => array(
                    'type' => 'password',
                    'maxlength' => 32,
                ),
                'rememberMe' => array(
                    'type' => 'checkbox',
                )
            ),
            'buttons' => array(
                'login' => array(
                    'type' => 'submit',
                    'label' => 'Login',
                ),
            ),
                ), $model);
?>

