<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wordnet-semverbframe-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'synsetno'); ?>
		<?php echo $form->textField($model,'synsetno',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'synsetno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frameno'); ?>
		<?php echo $form->textField($model,'frameno',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'frameno'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->