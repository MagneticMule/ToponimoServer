<?php
$this->breadcrumbs=array(
	'Wordnet Samples'=>array('index'),
	$model->_id,
);

$this->menu=array(
	array('label'=>'List WordnetSample', 'url'=>array('index')),
	array('label'=>'Create WordnetSample', 'url'=>array('create')),
	array('label'=>'Update WordnetSample', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Delete WordnetSample', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WordnetSample', 'url'=>array('admin')),
);
?>

<h1>View WordnetSample #<?php echo $model->_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'synsetno',
		'sampleno',
		'samp',
		'_id',
	),
)); ?>
