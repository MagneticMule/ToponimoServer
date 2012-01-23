<?php
$this->breadcrumbs=array(
	'Wordnet Semverbframes'=>array('index'),
	$model->_id,
);

$this->menu=array(
	array('label'=>'List WordnetSemverbframe', 'url'=>array('index')),
	array('label'=>'Create WordnetSemverbframe', 'url'=>array('create')),
	array('label'=>'Update WordnetSemverbframe', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Delete WordnetSemverbframe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WordnetSemverbframe', 'url'=>array('admin')),
);
?>

<h1>View WordnetSemverbframe #<?php echo $model->_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'synsetno',
		'frameno',
		'_id',
	),
)); ?>
