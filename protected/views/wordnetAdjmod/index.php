<?php
$this->breadcrumbs=array(
	'Wordnet Adjmods',
);

$this->menu=array(
	array('label'=>'Create WordnetAdjmod', 'url'=>array('create')),
	array('label'=>'Manage WordnetAdjmod', 'url'=>array('admin')),
);
?>

<h1>Wordnet Adjmods</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
