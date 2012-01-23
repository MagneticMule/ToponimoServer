<?php
$this->breadcrumbs=array(
	'Words',
);

$this->menu=array(
	array('label'=>'Create Word', 'url'=>array('create')),
	array('label'=>'Manage Word', 'url'=>array('admin')),
);
?>

<h1>Words</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
