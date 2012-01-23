<?php
$this->breadcrumbs=array(
	'Words'=>array('index'),
	$model->_id=>array('view','id'=>$model->_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Word', 'url'=>array('index')),
	array('label'=>'Create Word', 'url'=>array('create')),
	array('label'=>'View Word', 'url'=>array('view', 'id'=>$model->_id)),
	array('label'=>'Manage Word', 'url'=>array('admin')),
);
?>

<h1>Update Word <?php echo $model->_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>