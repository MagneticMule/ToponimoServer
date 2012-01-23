<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'word-addword-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'placeid'); ?>
		<?php echo $form->textField($model,'placeid'); ?>
		<?php echo $form->error($model,'placeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'word'); ?>
		<?php echo $form->textField($model,'word'); ?>
		<?php echo $form->error($model,'word'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userid'); ?>
		<?php echo $form->textField($model,'userid'); ?>
		<?php echo $form->error($model,'userid'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->