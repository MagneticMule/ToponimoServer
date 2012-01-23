<?php
$this->breadcrumbs=array(
	'Wordnet Lexnames'=>array('index'),
	$model->lexno,
);

$this->menu=array(
	array('label'=>'List WordnetLexname', 'url'=>array('index')),
	array('label'=>'Create WordnetLexname', 'url'=>array('create')),
	array('label'=>'Update WordnetLexname', 'url'=>array('update', 'id'=>$model->lexno)),
	array('label'=>'Delete WordnetLexname', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->lexno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WordnetLexname', 'url'=>array('admin')),
);
?>

<h1>View WordnetLexname #<?php echo $model->lexno; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'lexno',
		'lexname',
		'description',
	),
)); ?>
