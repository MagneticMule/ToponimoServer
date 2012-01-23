<?php
$this->breadcrumbs=array(
	'Wordnet Semverbframes'=>array('index'),
	$model->_id=>array('view','id'=>$model->_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WordnetSemverbframe', 'url'=>array('index')),
	array('label'=>'Create WordnetSemverbframe', 'url'=>array('create')),
	array('label'=>'View WordnetSemverbframe', 'url'=>array('view', 'id'=>$model->_id)),
	array('label'=>'Manage WordnetSemverbframe', 'url'=>array('admin')),
);
?>

<h1>Update WordnetSemverbframe <?php echo $model->_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>