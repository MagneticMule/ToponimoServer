<?php
$this->breadcrumbs=array(
	'Wordnet Semrels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WordnetSemrel', 'url'=>array('index')),
	array('label'=>'Manage WordnetSemrel', 'url'=>array('admin')),
);
?>

<h1>Create WordnetSemrel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>