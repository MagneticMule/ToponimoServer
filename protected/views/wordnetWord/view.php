<?php
$this->breadcrumbs=array(
	'Wordnet Words'=>array('index'),
	$model->wordno,
);

$this->menu=array(
	array('label'=>'List WordnetWord', 'url'=>array('index')),
	array('label'=>'Create WordnetWord', 'url'=>array('create')),
	array('label'=>'Update WordnetWord', 'url'=>array('update', 'id'=>$model->wordno)),
	array('label'=>'Delete WordnetWord', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->wordno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WordnetWord', 'url'=>array('admin')),
);
?>

<h1>View WordnetWord #<?php echo $model->wordno; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'wordno',
		'lemma',
	),
)); ?>
