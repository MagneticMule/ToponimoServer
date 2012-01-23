<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->_id), array('view', 'id'=>$data->_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('synsetno1')); ?>:</b>
	<?php echo CHtml::encode($data->synsetno1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('synsetno2')); ?>:</b>
	<?php echo CHtml::encode($data->synsetno2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reltypeno')); ?>:</b>
	<?php echo CHtml::encode($data->reltypeno); ?>
	<br />


</div>