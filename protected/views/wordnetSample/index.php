<?php
$this->breadcrumbs=array(
	'Wordnet Samples',
);

$this->menu=array(
	array('label'=>'Create WordnetSample', 'url'=>array('create')),
	array('label'=>'Manage WordnetSample', 'url'=>array('admin')),
);
?>

<h1>Wordnet Samples</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
