<?php
$this->breadcrumbs=array(
	'Wordnet Lexrels',
);

$this->menu=array(
	array('label'=>'Create WordnetLexrel', 'url'=>array('create')),
	array('label'=>'Manage WordnetLexrel', 'url'=>array('admin')),
);
?>

<h1>Wordnet Lexrels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
