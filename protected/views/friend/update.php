<?php
$this->breadcrumbs=array(
	'Friends'=>array('index'),
	$model->friendid=>array('view','id'=>$model->friendid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Friend', 'url'=>array('index')),
	array('label'=>'Create Friend', 'url'=>array('create')),
	array('label'=>'View Friend', 'url'=>array('view', 'id'=>$model->friendid)),
	array('label'=>'Manage Friend', 'url'=>array('admin')),
);
?>

<h1>Update Friend <?php echo $model->friendid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>