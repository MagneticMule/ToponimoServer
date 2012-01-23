<?php
$this->breadcrumbs=array(
	'Userbanks'=>array('index'),
	$model->wordno=>array('view','id'=>$model->wordno),
	'Update',
);

$this->menu=array(
	array('label'=>'List Userbank', 'url'=>array('index')),
	array('label'=>'Create Userbank', 'url'=>array('create')),
	array('label'=>'View Userbank', 'url'=>array('view', 'id'=>$model->wordno)),
	array('label'=>'Manage Userbank', 'url'=>array('admin')),
);
?>

<h1>Update Userbank <?php echo $model->wordno; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>