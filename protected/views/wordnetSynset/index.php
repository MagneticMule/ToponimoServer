<?php
$this->breadcrumbs=array(
	'Wordnet Synsets',
);

$this->menu=array(
	array('label'=>'Create WordnetSynset', 'url'=>array('create')),
	array('label'=>'Manage WordnetSynset', 'url'=>array('admin')),
);
?>

<h1>Wordnet Synsets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
