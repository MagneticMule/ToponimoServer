<?php
$this->breadcrumbs=array(
	'Wordnet Lexrels'=>array('index'),
	$model->_id,
);

$this->menu=array(
	array('label'=>'List WordnetLexrel', 'url'=>array('index')),
	array('label'=>'Create WordnetLexrel', 'url'=>array('create')),
	array('label'=>'Update WordnetLexrel', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Delete WordnetLexrel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WordnetLexrel', 'url'=>array('admin')),
);
?>

<h1>View WordnetLexrel #<?php echo $model->_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'wordno1',
		'synsetno1',
		'wordno2',
		'synsetno2',
		'reltypeno',
		'_id',
	),
)); ?>
