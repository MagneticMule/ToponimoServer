<div class="view">

    <div class="well">
        <h2>
        <b><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id' => $data->_id)); ?></b>

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


<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b> -->
        </h2>

        <?php
        echo CHtml::encode($data->type->type);
        $vars = Type::model()->getArrayPlaceTypes($data->placeid);
        foreach ($vars as $type) {
            // if ($type != 'establishment') {
            $placeTypeText = str_replace('_', ' ', ucfirst($type));
            // }
            $this->widget('bootstrap.widgets.BootLabel', array(
                'type' => 'success', // '', 'success', 'warning', 'important', 'info' or 'inverse'
                'label' => $placeTypeText,
            ));
            echo '    ';
        }
        ?>



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
</div>