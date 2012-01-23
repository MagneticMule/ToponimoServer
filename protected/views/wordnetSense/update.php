<?php
$this->breadcrumbs=array(
	'Wordnet Senses'=>array('index'),
	$model->_id=>array('view','id'=>$model->_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WordnetSense', 'url'=>array('index')),
	array('label'=>'Create WordnetSense', 'url'=>array('create')),
	array('label'=>'View WordnetSense', 'url'=>array('view', 'id'=>$model->_id)),
	array('label'=>'Manage WordnetSense', 'url'=>array('admin')),
);
?>

<h1>Update WordnetSense <?php echo $model->_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>