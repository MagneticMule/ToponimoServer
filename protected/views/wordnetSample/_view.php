<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->_id), array('view', 'id'=>$data->_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('synsetno')); ?>:</b>
	<?php echo CHtml::encode($data->synsetno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sampleno')); ?>:</b>
	<?php echo CHtml::encode($data->sampleno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('samp')); ?>:</b>
	<?php echo CHtml::encode($data->samp); ?>
	<br />


</div>