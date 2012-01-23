<?php
$this->breadcrumbs=array(
	'Wordnet Senses',
);

$this->menu=array(
	array('label'=>'Create WordnetSense', 'url'=>array('create')),
	array('label'=>'Manage WordnetSense', 'url'=>array('admin')),
);
?>

<h1>Wordnet Senses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
