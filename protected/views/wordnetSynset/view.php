<?php
$this->breadcrumbs=array(
	'Wordnet Synsets'=>array('index'),
	$model->synsetno,
);

$this->menu=array(
	array('label'=>'List WordnetSynset', 'url'=>array('index')),
	array('label'=>'Create WordnetSynset', 'url'=>array('create')),
	array('label'=>'Update WordnetSynset', 'url'=>array('update', 'id'=>$model->synsetno)),
	array('label'=>'Delete WordnetSynset', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->synsetno),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WordnetSynset', 'url'=>array('admin')),
);
?>

<h1>View WordnetSynset #<?php echo $model->synsetno; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'synsetno',
		'definition',
		'lexno',
	),
)); ?>
