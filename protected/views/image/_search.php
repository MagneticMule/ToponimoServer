<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'placeid'); ?>
		<?php echo $form->textField($model,'placeid',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'word'); ?>
		<?php echo $form->textField($model,'word',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ownerid'); ?>
		<?php echo $form->textField($model,'ownerid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wordid'); ?>
		<?php echo $form->textField($model,'wordid',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->