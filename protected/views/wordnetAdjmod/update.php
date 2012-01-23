<?php
$this->breadcrumbs=array(
	'Wordnet Adjmods'=>array('index'),
	$model->_id=>array('view','id'=>$model->_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WordnetAdjmod', 'url'=>array('index')),
	array('label'=>'Create WordnetAdjmod', 'url'=>array('create')),
	array('label'=>'View WordnetAdjmod', 'url'=>array('view', 'id'=>$model->_id)),
	array('label'=>'Manage WordnetAdjmod', 'url'=>array('admin')),
);
?>

<h1>Update WordnetAdjmod <?php echo $model->_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>