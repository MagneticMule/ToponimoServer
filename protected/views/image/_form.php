<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'image-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'placeid'); ?>
		<?php echo $form->textField($model,'placeid',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'placeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'word'); ?>
		<?php echo $form->textField($model,'word',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'word'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ownerid'); ?>
		<?php echo $form->textField($model,'ownerid'); ?>
		<?php echo $form->error($model,'ownerid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wordid'); ?>
		<?php echo $form->textField($model,'wordid',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'wordid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->