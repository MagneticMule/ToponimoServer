<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->_id), array('view', 'id'=>$data->_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('synsetno')); ?>:</b>
	<?php echo CHtml::encode($data->synsetno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wordno')); ?>:</b>
	<?php echo CHtml::encode($data->wordno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('frameno')); ?>:</b>
	<?php echo CHtml::encode($data->frameno); ?>
	<br />


</div>