<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('synsetno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->synsetno), array('view', 'id'=>$data->synsetno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('definition')); ?>:</b>
	<?php echo CHtml::encode($data->definition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lexno')); ?>:</b>
	<?php echo CHtml::encode($data->lexno); ?>
	<br />


</div>