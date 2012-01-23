<?php
$this->breadcrumbs=array(
	'Friends'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Friend', 'url'=>array('index')),
	array('label'=>'Manage Friend', 'url'=>array('admin')),
);
?>

<h1>Create Friend</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>