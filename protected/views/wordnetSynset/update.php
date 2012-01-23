<?php
$this->breadcrumbs=array(
	'Wordnet Synsets'=>array('index'),
	$model->synsetno=>array('view','id'=>$model->synsetno),
	'Update',
);

$this->menu=array(
	array('label'=>'List WordnetSynset', 'url'=>array('index')),
	array('label'=>'Create WordnetSynset', 'url'=>array('create')),
	array('label'=>'View WordnetSynset', 'url'=>array('view', 'id'=>$model->synsetno)),
	array('label'=>'Manage WordnetSynset', 'url'=>array('admin')),
);
?>

<h1>Update WordnetSynset <?php echo $model->synsetno; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>