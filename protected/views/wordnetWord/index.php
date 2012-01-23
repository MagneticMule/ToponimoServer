<?php
$this->breadcrumbs=array(
	'Wordnet Words',
);

$this->menu=array(
	array('label'=>'Create WordnetWord', 'url'=>array('create')),
	array('label'=>'Manage WordnetWord', 'url'=>array('admin')),
);
?>

<h1>Wordnet Words</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
