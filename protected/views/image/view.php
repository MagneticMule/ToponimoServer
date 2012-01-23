<?php
$this->breadcrumbs=array(
	'Images'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Image', 'url'=>array('index')),
	array('label'=>'Create Image', 'url'=>array('create')),
	array('label'=>'Update Image', 'url'=>array('update', 'id'=>$model->placeid)),
	array('label'=>'Delete Image', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->placeid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Image', 'url'=>array('admin')),
);
?>

<h1>View Image #<?php echo $model->placeid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'id',
		'placeid',
		'word',
		'ownerid',
		'wordid',
	),
)); ?>
