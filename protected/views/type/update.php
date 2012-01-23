<?php
$this->breadcrumbs=array(
	'Types'=>array('index'),
	$model->_id=>array('view','id'=>$model->_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Type', 'url'=>array('index')),
	array('label'=>'Create Type', 'url'=>array('create')),
	array('label'=>'View Type', 'url'=>array('view', 'id'=>$model->_id)),
	array('label'=>'Manage Type', 'url'=>array('admin')),
);
?>

<h1>Update Type <?php echo $model->_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>