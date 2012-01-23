<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'synsetno'); ?>
		<?php echo $form->textField($model,'synsetno',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'definition'); ?>
		<?php echo $form->textArea($model,'definition',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lexno'); ?>
		<?php echo $form->textField($model,'lexno',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->