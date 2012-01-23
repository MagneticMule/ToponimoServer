<?php
$this->breadcrumbs=array(
	'Wordnet Words'=>array('index'),
	$model->wordno=>array('view','id'=>$model->wordno),
	'Update',
);

$this->menu=array(
	array('label'=>'List WordnetWord', 'url'=>array('index')),
	array('label'=>'Create WordnetWord', 'url'=>array('create')),
	array('label'=>'View WordnetWord', 'url'=>array('view', 'id'=>$model->wordno)),
	array('label'=>'Manage WordnetWord', 'url'=>array('admin')),
);
?>

<h1>Update WordnetWord <?php echo $model->wordno; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>