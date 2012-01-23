<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wordnet-sample-form',
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
		<?php echo $form->labelEx($model,'sampleno'); ?>
		<?php echo $form->textField($model,'sampleno',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'sampleno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'samp'); ?>
		<?php echo $form->textArea($model,'samp',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'samp'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->