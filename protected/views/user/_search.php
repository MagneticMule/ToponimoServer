<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'_id'); ?>
		<?php echo $form->textField($model,'_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'middle_initial'); ?>
		<?php echo $form->textField($model,'middle_initial',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'d_o_b'); ?>
		<?php echo $form->textField($model,'d_o_b'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address_1'); ?>
		<?php echo $form->textField($model,'address_1',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address_2'); ?>
		<?php echo $form->textField($model,'address_2',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'region'); ?>
		<?php echo $form->textField($model,'region',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mob_phone'); ?>
		<?php echo $form->textField($model,'mob_phone'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->