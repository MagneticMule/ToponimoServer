<?php
$this->breadcrumbs=array(
	'Wordnet Senses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WordnetSense', 'url'=>array('index')),
	array('label'=>'Manage WordnetSense', 'url'=>array('admin')),
);
?>

<h1>Create WordnetSense</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>