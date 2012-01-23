<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('friendid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->friendid), array('view', 'id'=>$data->friendid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->userid); ?>
	<br />


</div>