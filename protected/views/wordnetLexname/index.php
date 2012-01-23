<?php
$this->breadcrumbs=array(
	'Wordnet Lexnames',
);

$this->menu=array(
	array('label'=>'Create WordnetLexname', 'url'=>array('create')),
	array('label'=>'Manage WordnetLexname', 'url'=>array('admin')),
);
?>

<h1>Wordnet Lexnames</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
