<?php
$this->breadcrumbs=array(
	'Wordnet Frames',
);

$this->menu=array(
	array('label'=>'Create WordnetFrame', 'url'=>array('create')),
	array('label'=>'Manage WordnetFrame', 'url'=>array('admin')),
);
?>

<h1>Wordnet Frames</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
