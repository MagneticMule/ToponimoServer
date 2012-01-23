<?php
$this->breadcrumbs=array(
	'Wordnet Semrels'=>array('index'),
	$model->_id,
);

$this->menu=array(
	array('label'=>'List WordnetSemrel', 'url'=>array('index')),
	array('label'=>'Create WordnetSemrel', 'url'=>array('create')),
	array('label'=>'Update WordnetSemrel', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Delete WordnetSemrel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WordnetSemrel', 'url'=>array('admin')),
);
?>

<h1>View WordnetSemrel #<?php echo $model->_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'synsetno1',
		'synsetno2',
		'reltypeno',
		'_id',
	),
)); ?>
