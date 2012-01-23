<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'_id'); ?>
		<?php echo $form->textField($model,'_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wordid'); ?>
		<?php echo $form->textField($model,'wordid',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'word'); ?>
		<?php echo $form->textField($model,'word',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'placetypeid'); ?>
		<?php echo $form->textField($model,'placetypeid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->