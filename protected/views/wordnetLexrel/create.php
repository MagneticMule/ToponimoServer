<?php
$this->breadcrumbs=array(
	'Wordnet Lexrels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WordnetLexrel', 'url'=>array('index')),
	array('label'=>'Manage WordnetLexrel', 'url'=>array('admin')),
);
?>

<h1>Create WordnetLexrel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>