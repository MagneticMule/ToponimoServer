<?php
$this->breadcrumbs=array(
	'Wordnet Words'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WordnetWord', 'url'=>array('index')),
	array('label'=>'Manage WordnetWord', 'url'=>array('admin')),
);
?>

<h1>Create WordnetWord</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>