<?php
if (!$profile = $model->profile)
    $profile = new YumProfile;
$this->pageTitle = Yii::app()->name . ' - ' . Yum::t('Profile');
$this->title = CHtml::activeLabel($model, 'username');
$this->breadcrumbs = array(Yum::t('Profile'), $model->username);
Yum::renderFlash();
?>

<div id="profile">

    <?php
    if (!Yii::app()->user->isGuest && Yii::app()->user->id == $model->id) {
        echo CHtml::link(Yum::t('Edit profile'), array('//profile/profile/update'));
    }
    ?>

    <?php
    echo CHtml::link(Yum::t('<div id="image_with_border">' . $model->getAvatar() . '</div>'), array('//avatar/avatar/editAvatar'));
    ?>
    <div id="profile_details">
        <?php
        $this->renderPartial(Yum::module('profile')->publicFieldsView, array(
            'profile' => $model->profile));
        ?>
    </div>

    <br />
    <div>
    <?php
    if (Yum::hasModule('friendship'))
        $this->renderPartial(
                'application.modules.friendship.views.friendship.friends', array(
            'model' => $model));
    ?>
    <br />
    <?php
    if (@Yum::module('message')->messageSystem != 0)
        $this->renderPartial('/message/write_a_message', array(
            'model' => $model));
    ?>
    <br />
    <?php
    if (Yum::module('profile')->enableProfileComments
            && Yii::app()->controller->action->id != 'update'
            && isset($model->profile))
        $this->renderPartial(Yum::module('profile')->profileCommentIndexView, array(
            'model' => $model->profile));
    ?>
    </div>
</div>



