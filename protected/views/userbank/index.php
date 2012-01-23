<?php
$this->breadcrumbs=array(
	'Userbanks',
);

$this->menu=array(
	array('label'=>'Create Userbank', 'url'=>array('create')),
	array('label'=>'Manage Userbank', 'url'=>array('admin')),
);
?>

<h1>Userbanks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
