<?php
$this->breadcrumbs=array(
	'Wordenglishes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Wordenglish', 'url'=>array('index')),
	array('label'=>'Manage Wordenglish', 'url'=>array('admin')),
);
?>

<h1>Create Wordenglish</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>