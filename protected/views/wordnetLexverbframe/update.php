<?php
$this->breadcrumbs=array(
	'Wordnet Lexverbframes'=>array('index'),
	$model->_id=>array('view','id'=>$model->_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WordnetLexverbframe', 'url'=>array('index')),
	array('label'=>'Create WordnetLexverbframe', 'url'=>array('create')),
	array('label'=>'View WordnetLexverbframe', 'url'=>array('view', 'id'=>$model->_id)),
	array('label'=>'Manage WordnetLexverbframe', 'url'=>array('admin')),
);
?>

<h1>Update WordnetLexverbframe <?php echo $model->_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>