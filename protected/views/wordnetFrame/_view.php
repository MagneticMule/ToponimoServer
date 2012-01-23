<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('frameno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->frameno), array('view', 'id'=>$data->frameno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>