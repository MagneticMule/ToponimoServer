<div class="view">

	
	<b><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->_id)); ?></b>
	<br />

        <!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
        <br />

	
        <b><?php echo CHtml::encode($data->getAttributeLabel('latitude')); ?>:</b>
	<?php echo CHtml::encode($data->latitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longitude')); ?>:</b>
	<?php echo CHtml::encode($data->longitude); ?>
	<br />
        -->

        <?php echo CHtml::encode($data->vicinity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

        <!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('last_updated')); ?>:</b>
	<?php echo CHtml::encode($data->last_updated); ?>
	<br />
        -->

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('placeid')); ?>:</b>
	<?php echo CHtml::encode($data->placeid); ?>
	<br />

	*/ ?>

</div>