<?php
$this->breadcrumbs=array(
	'Wordnet Reltypes',
);

$this->menu=array(
	array('label'=>'Create WordnetReltype', 'url'=>array('create')),
	array('label'=>'Manage WordnetReltype', 'url'=>array('admin')),
);
?>

<h1>Wordnet Reltypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
