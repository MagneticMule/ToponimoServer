<?php
$this->breadcrumbs=array(
	'Wordenglishes'=>array('index'),
	$model->_id,
);

$this->menu=array(
	array('label'=>'List Wordenglish', 'url'=>array('index')),
	array('label'=>'Create Wordenglish', 'url'=>array('create')),
	array('label'=>'Update Wordenglish', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Delete Wordenglish', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Wordenglish', 'url'=>array('admin')),
);
?>

<h1>View Wordenglish #<?php echo $model->_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'_id',
		'wordid',
		'word',
		'placetypeid',
	),
)); ?>
