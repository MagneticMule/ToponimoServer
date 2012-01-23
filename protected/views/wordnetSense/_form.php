<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wordnet-sense-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'wordno'); ?>
		<?php echo $form->textField($model,'wordno',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'wordno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'synsetno'); ?>
		<?php echo $form->textField($model,'synsetno',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'synsetno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tagcnt'); ?>
		<?php echo $form->textField($model,'tagcnt',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'tagcnt'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->