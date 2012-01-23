<?php
$this->breadcrumbs=array(
	'Wordnet Frames'=>array('index'),
	$model->frameno=>array('view','id'=>$model->frameno),
	'Update',
);

$this->menu=array(
	array('label'=>'List WordnetFrame', 'url'=>array('index')),
	array('label'=>'Create WordnetFrame', 'url'=>array('create')),
	array('label'=>'View WordnetFrame', 'url'=>array('view', 'id'=>$model->frameno)),
	array('label'=>'Manage WordnetFrame', 'url'=>array('admin')),
);
?>

<h1>Update WordnetFrame <?php echo $model->frameno; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>