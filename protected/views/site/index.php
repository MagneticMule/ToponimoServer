<?php $this->pageTitle = Yii::app()->name; ?>

<?php
$this->beginWidget('bootstrap.widgets.BootHero', array(
    'heading' => 'Hello there!',
));
?>
<p>Toponimo is almost certainly the worlds original and best crowd-sourced location-based dictionary for English language learning. We are currently in
    private beta but should be opening up shop soon. If you are already a member you can login below.
    <br/> 
    Cheers!
</p>

<p><?php
$this->widget('bootstrap.widgets.BootButton', array(
    'type' => 'primary',
    'size' => 'large',
    'label' => 'Login',
));
?></p>
<?php $this->endWidget(); ?>
