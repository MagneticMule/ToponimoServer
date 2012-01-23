<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('lexno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->lexno), array('view', 'id'=>$data->lexno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lexname')); ?>:</b>
	<?php echo CHtml::encode($data->lexname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>