<?php
$this->breadcrumbs=array(
	'Userbanks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Userbank', 'url'=>array('index')),
	array('label'=>'Manage Userbank', 'url'=>array('admin')),
);
?>

<h1>Create Userbank</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>