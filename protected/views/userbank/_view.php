<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('wordno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->wordno), array('view', 'id'=>$data->wordno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lemma')); ?>:</b>
	<?php echo CHtml::encode($data->lemma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lat')); ?>:</b>
	<?php echo CHtml::encode($data->lat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lng')); ?>:</b>
	<?php echo CHtml::encode($data->lng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('placeid')); ?>:</b>
	<?php echo CHtml::encode($data->placeid); ?>
	<br />


</div>