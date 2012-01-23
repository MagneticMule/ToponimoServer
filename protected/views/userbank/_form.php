<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'userbank-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lemma'); ?>
		<?php echo $form->textArea($model,'lemma',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'lemma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wordno'); ?>
		<?php echo $form->textField($model,'wordno',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'wordno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lat'); ?>
		<?php echo $form->textField($model,'lat'); ?>
		<?php echo $form->error($model,'lat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lng'); ?>
		<?php echo $form->textField($model,'lng'); ?>
		<?php echo $form->error($model,'lng'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'placeid'); ?>
		<?php echo $form->textField($model,'placeid',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'placeid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->