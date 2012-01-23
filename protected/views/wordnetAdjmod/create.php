<?php
$this->breadcrumbs=array(
	'Wordnet Adjmods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WordnetAdjmod', 'url'=>array('index')),
	array('label'=>'Manage WordnetAdjmod', 'url'=>array('admin')),
);
?>

<h1>Create WordnetAdjmod</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>