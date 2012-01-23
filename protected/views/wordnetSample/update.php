<?php
$this->breadcrumbs=array(
	'Wordnet Samples'=>array('index'),
	$model->_id=>array('view','id'=>$model->_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WordnetSample', 'url'=>array('index')),
	array('label'=>'Create WordnetSample', 'url'=>array('create')),
	array('label'=>'View WordnetSample', 'url'=>array('view', 'id'=>$model->_id)),
	array('label'=>'Manage WordnetSample', 'url'=>array('admin')),
);
?>

<h1>Update WordnetSample <?php echo $model->_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>