<?php
$this->breadcrumbs=array(
	'Wordnet Reltypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WordnetReltype', 'url'=>array('index')),
	array('label'=>'Manage WordnetReltype', 'url'=>array('admin')),
);
?>

<h1>Create WordnetReltype</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>