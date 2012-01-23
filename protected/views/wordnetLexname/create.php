<?php
$this->breadcrumbs=array(
	'Wordnet Lexnames'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WordnetLexname', 'url'=>array('index')),
	array('label'=>'Manage WordnetLexname', 'url'=>array('admin')),
);
?>

<h1>Create WordnetLexname</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>