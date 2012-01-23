<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('placeid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->placeid), array('view', 'id'=>$data->placeid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('word')); ?>:</b>
	<?php echo CHtml::encode($data->word); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ownerid')); ?>:</b>
	<?php echo CHtml::encode($data->ownerid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wordid')); ?>:</b>
	<?php echo CHtml::encode($data->wordid); ?>
	<br />


</div>