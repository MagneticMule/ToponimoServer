<div class="form">
<?php
$this->title = Yum::t('Edit avatar');

$this->breadcrumbs = array(
		Yum::t('Profile') => array('//profile/profile/view'),
		Yum::t('Upload avatar'));

if($model->avatar) {

	echo $model->getAvatar();
}
else
	echo Yum::t('You have not set an Avatar image yet');

	echo '<br />';

if(Yum::module('avatar')->avatarMaxWidth != 0)
	echo '<p>' . Yum::t('The image shoulbe be between 50 pixels and 200 pixels. Supported filetypes are .jpg, .gif and .png') . '</p>';

	echo CHtml::errorSummary($model);
	echo CHtml::beginForm(array(
				'//avatar/avatar/editAvatar'), 'POST', array(
	'enctype' => 'multipart/form-data'));
	echo '<div class="row">';
	echo CHtml::activeLabelEx($model, 'avatar');
	echo CHtml::activeFileField($model, 'avatar');
	echo CHtml::error($model, 'avatar');
	echo '</div>';
	if(Yum::module('avatar')->enableGravatar) 
	echo CHtml::Button(Yum::t('Use my Gravatar'), array(
				'submit' => array(
					'avatar/enableGravatar')));

	echo CHtml::Button(Yum::t('Remove Avatar'), array(
				'submit' => array(
					'avatar/removeAvatar')));
	echo CHtml::submitButton(Yum::t('Upload Avatar'));
	echo CHtml::endForm();

?>
</div>
