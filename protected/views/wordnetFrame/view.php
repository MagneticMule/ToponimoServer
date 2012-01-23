<?php
$this->breadcrumbs=array(
	'Wordnet Frames'=>array('index'),
	$model->frameno,
);

$this->menu=array(
	array('label'=>'List WordnetFrame', 'url'=>array('index')),
	array('label'=>'Create WordnetFrame', 'url'=>array('create')),
	array('label'=>'Update WordnetFrame', 'url'=>array('update', 'id'=>$model->frameno)),
	array('label'=>'Delete WordnetFrame', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->frameno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WordnetFrame', 'url'=>array('admin')),
);
?>

<h1>View WordnetFrame #<?php echo $model->frameno; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'frameno',
		'description',
	),
)); ?>
