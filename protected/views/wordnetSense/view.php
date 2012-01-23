<?php
$this->breadcrumbs=array(
	'Wordnet Senses'=>array('index'),
	$model->_id,
);

$this->menu=array(
	array('label'=>'List WordnetSense', 'url'=>array('index')),
	array('label'=>'Create WordnetSense', 'url'=>array('create')),
	array('label'=>'Update WordnetSense', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Delete WordnetSense', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WordnetSense', 'url'=>array('admin')),
);
?>

<h1>View WordnetSense #<?php echo $model->_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'wordno',
		'synsetno',
		'tagcnt',
		'_id',
	),
)); ?>
