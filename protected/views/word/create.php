<?php
$this->breadcrumbs=array(
	'Words'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Word', 'url'=>array('index')),
	array('label'=>'Manage Word', 'url'=>array('admin')),
);
?>

<h1>Create Word</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>