<?php
$this->breadcrumbs=array(
	'Wordnet Lexverbframes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WordnetLexverbframe', 'url'=>array('index')),
	array('label'=>'Manage WordnetLexverbframe', 'url'=>array('admin')),
);
?>

<h1>Create WordnetLexverbframe</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>