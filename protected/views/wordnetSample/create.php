<?php
$this->breadcrumbs=array(
	'Wordnet Samples'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WordnetSample', 'url'=>array('index')),
	array('label'=>'Manage WordnetSample', 'url'=>array('admin')),
);
?>

<h1>Create WordnetSample</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>