<?php
$this->breadcrumbs=array(
	'Userbanks'=>array('index'),
	$model->wordno,
);

$this->menu=array(
	array('label'=>'List Userbank', 'url'=>array('index')),
	array('label'=>'Create Userbank', 'url'=>array('create')),
	array('label'=>'Update Userbank', 'url'=>array('update', 'id'=>$model->wordno)),
	array('label'=>'Delete Userbank', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->wordno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Userbank', 'url'=>array('admin')),
);
?>

<h1>View Userbank #<?php echo $model->wordno; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'lemma',
		'wordno',
		'lat',
		'lng',
		'placeid',
	),
)); ?>
