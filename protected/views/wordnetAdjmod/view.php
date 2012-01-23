<?php
$this->breadcrumbs=array(
	'Wordnet Adjmods'=>array('index'),
	$model->_id,
);

$this->menu=array(
	array('label'=>'List WordnetAdjmod', 'url'=>array('index')),
	array('label'=>'Create WordnetAdjmod', 'url'=>array('create')),
	array('label'=>'Update WordnetAdjmod', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Delete WordnetAdjmod', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WordnetAdjmod', 'url'=>array('admin')),
);
?>

<h1>View WordnetAdjmod #<?php echo $model->_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'synsetno',
		'wordno',
		'modifier',
		'_id',
	),
)); ?>
