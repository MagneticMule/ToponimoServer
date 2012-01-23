<?php
$this->breadcrumbs=array(
	'Wordnet Reltypes'=>array('index'),
	$model->reltypeno,
);

$this->menu=array(
	array('label'=>'List WordnetReltype', 'url'=>array('index')),
	array('label'=>'Create WordnetReltype', 'url'=>array('create')),
	array('label'=>'Update WordnetReltype', 'url'=>array('update', 'id'=>$model->reltypeno)),
	array('label'=>'Delete WordnetReltype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->reltypeno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WordnetReltype', 'url'=>array('admin')),
);
?>

<h1>View WordnetReltype #<?php echo $model->reltypeno; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'reltypeno',
		'typeno',
		'description',
	),
)); ?>
