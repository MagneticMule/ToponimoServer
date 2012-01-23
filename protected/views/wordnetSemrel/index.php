<?php
$this->breadcrumbs=array(
	'Wordnet Semrels',
);

$this->menu=array(
	array('label'=>'Create WordnetSemrel', 'url'=>array('create')),
	array('label'=>'Manage WordnetSemrel', 'url'=>array('admin')),
);
?>

<h1>Wordnet Semrels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
