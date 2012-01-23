<?php
$this->breadcrumbs=array(
	'Wordnet Reltypes'=>array('index'),
	$model->reltypeno=>array('view','id'=>$model->reltypeno),
	'Update',
);

$this->menu=array(
	array('label'=>'List WordnetReltype', 'url'=>array('index')),
	array('label'=>'Create WordnetReltype', 'url'=>array('create')),
	array('label'=>'View WordnetReltype', 'url'=>array('view', 'id'=>$model->reltypeno)),
	array('label'=>'Manage WordnetReltype', 'url'=>array('admin')),
);
?>

<h1>Update WordnetReltype <?php echo $model->reltypeno; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>