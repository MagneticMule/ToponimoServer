<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'word-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'placeid'); ?>
		<?php echo $form->textField($model,'placeid',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'placeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'word'); ?>
		<?php echo $form->textField($model,'word',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'word'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userid'); ?>
		<?php echo $form->textField($model,'userid'); ?>
		<?php echo $form->error($model,'userid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->