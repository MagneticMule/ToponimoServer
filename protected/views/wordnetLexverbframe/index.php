<?php
$this->breadcrumbs=array(
	'Wordnet Lexverbframes',
);

$this->menu=array(
	array('label'=>'Create WordnetLexverbframe', 'url'=>array('create')),
	array('label'=>'Manage WordnetLexverbframe', 'url'=>array('admin')),
);
?>

<h1>Wordnet Lexverbframes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
