<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wordenglish-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'wordid'); ?>
		<?php echo $form->textField($model,'wordid',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'wordid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'word'); ?>
		<?php echo $form->textField($model,'word',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'word'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'placetypeid'); ?>
		<?php echo $form->textField($model,'placetypeid'); ?>
		<?php echo $form->error($model,'placetypeid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->