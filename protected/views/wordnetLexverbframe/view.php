<?php
$this->breadcrumbs=array(
	'Wordnet Lexverbframes'=>array('index'),
	$model->_id,
);

$this->menu=array(
	array('label'=>'List WordnetLexverbframe', 'url'=>array('index')),
	array('label'=>'Create WordnetLexverbframe', 'url'=>array('create')),
	array('label'=>'Update WordnetLexverbframe', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Delete WordnetLexverbframe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WordnetLexverbframe', 'url'=>array('admin')),
);
?>

<h1>View WordnetLexverbframe #<?php echo $model->_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'synsetno',
		'wordno',
		'frameno',
		'_id',
	),
)); ?>
