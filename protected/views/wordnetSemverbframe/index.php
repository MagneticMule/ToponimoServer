<?php
$this->breadcrumbs=array(
	'Wordnet Semverbframes',
);

$this->menu=array(
	array('label'=>'Create WordnetSemverbframe', 'url'=>array('create')),
	array('label'=>'Manage WordnetSemverbframe', 'url'=>array('admin')),
);
?>

<h1>Wordnet Semverbframes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
