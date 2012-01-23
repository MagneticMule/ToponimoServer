<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('wordno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->wordno), array('view', 'id'=>$data->wordno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lemma')); ?>:</b>
	<?php echo CHtml::encode($data->lemma); ?>
	<br />


</div>