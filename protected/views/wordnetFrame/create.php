<?php
$this->breadcrumbs=array(
	'Wordnet Frames'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WordnetFrame', 'url'=>array('index')),
	array('label'=>'Manage WordnetFrame', 'url'=>array('admin')),
);
?>

<h1>Create WordnetFrame</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>