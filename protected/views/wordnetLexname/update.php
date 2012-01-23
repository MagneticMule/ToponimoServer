<?php
$this->breadcrumbs=array(
	'Wordnet Lexnames'=>array('index'),
	$model->lexno=>array('view','id'=>$model->lexno),
	'Update',
);

$this->menu=array(
	array('label'=>'List WordnetLexname', 'url'=>array('index')),
	array('label'=>'Create WordnetLexname', 'url'=>array('create')),
	array('label'=>'View WordnetLexname', 'url'=>array('view', 'id'=>$model->lexno)),
	array('label'=>'Manage WordnetLexname', 'url'=>array('admin')),
);
?>

<h1>Update WordnetLexname <?php echo $model->lexno; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>