<?php
$this->breadcrumbs=array(
	'Friends',
);

$this->menu=array(
	array('label'=>'Create Friend', 'url'=>array('create')),
	array('label'=>'Manage Friend', 'url'=>array('admin')),
);
?>

<h1>Friends</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
