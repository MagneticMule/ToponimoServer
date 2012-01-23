<?php
$this->breadcrumbs=array(
	'Wordnet Semverbframes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WordnetSemverbframe', 'url'=>array('index')),
	array('label'=>'Manage WordnetSemverbframe', 'url'=>array('admin')),
);
?>

<h1>Create WordnetSemverbframe</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>