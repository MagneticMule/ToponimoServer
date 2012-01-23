<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wordnet-reltype-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'reltypeno'); ?>
		<?php echo $form->textField($model,'reltypeno',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'reltypeno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'typeno'); ?>
		<?php echo $form->textField($model,'typeno',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'typeno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->