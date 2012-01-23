<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wordnet-lexrel-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'wordno1'); ?>
		<?php echo $form->textField($model,'wordno1',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'wordno1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'synsetno1'); ?>
		<?php echo $form->textField($model,'synsetno1',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'synsetno1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wordno2'); ?>
		<?php echo $form->textField($model,'wordno2',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'wordno2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'synsetno2'); ?>
		<?php echo $form->textField($model,'synsetno2',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'synsetno2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reltypeno'); ?>
		<?php echo $form->textField($model,'reltypeno',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'reltypeno'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->