<?php
$this->breadcrumbs=array(
	'Wordenglishes',
);

$this->menu=array(
	array('label'=>'Create Wordenglish', 'url'=>array('create')),
	array('label'=>'Manage Wordenglish', 'url'=>array('admin')),
);
?>

<h1>Wordenglishes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
