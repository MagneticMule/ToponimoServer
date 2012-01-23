<?php
$this->breadcrumbs=array(
	'Wordenglishes'=>array('index'),
	$model->_id=>array('view','id'=>$model->_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Wordenglish', 'url'=>array('index')),
	array('label'=>'Create Wordenglish', 'url'=>array('create')),
	array('label'=>'View Wordenglish', 'url'=>array('view', 'id'=>$model->_id)),
	array('label'=>'Manage Wordenglish', 'url'=>array('admin')),
);
?>

<h1>Update Wordenglish <?php echo $model->_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>