<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('reltypeno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->reltypeno), array('view', 'id'=>$data->reltypeno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typeno')); ?>:</b>
	<?php echo CHtml::encode($data->typeno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>