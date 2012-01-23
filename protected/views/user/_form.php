<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'salt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'middle_initial'); ?>
		<?php echo $form->textField($model,'middle_initial',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'middle_initial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_o_b'); ?>
		<?php echo $form->textField($model,'d_o_b'); ?>
		<?php echo $form->error($model,'d_o_b'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_1'); ?>
		<?php echo $form->textField($model,'address_1',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'address_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_2'); ?>
		<?php echo $form->textField($model,'address_2',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'address_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region'); ?>
		<?php echo $form->textField($model,'region',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mob_phone'); ?>
		<?php echo $form->textField($model,'mob_phone'); ?>
		<?php echo $form->error($model,'mob_phone'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->