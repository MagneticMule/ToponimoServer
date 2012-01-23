<?php
$this->breadcrumbs=array(
	'Wordnet Synsets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WordnetSynset', 'url'=>array('index')),
	array('label'=>'Manage WordnetSynset', 'url'=>array('admin')),
);
?>

<h1>Create WordnetSynset</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>