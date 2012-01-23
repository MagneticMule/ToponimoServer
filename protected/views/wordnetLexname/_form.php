<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wordnet-lexname-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'lexno'); ?>
		<?php echo $form->textField($model,'lexno',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'lexno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lexname'); ?>
		<?php echo $form->textField($model,'lexname',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'lexname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->