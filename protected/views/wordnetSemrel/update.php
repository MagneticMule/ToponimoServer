<?php
$this->breadcrumbs=array(
	'Wordnet Semrels'=>array('index'),
	$model->_id=>array('view','id'=>$model->_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WordnetSemrel', 'url'=>array('index')),
	array('label'=>'Create WordnetSemrel', 'url'=>array('create')),
	array('label'=>'View WordnetSemrel', 'url'=>array('view', 'id'=>$model->_id)),
	array('label'=>'Manage WordnetSemrel', 'url'=>array('admin')),
);
?>

<h1>Update WordnetSemrel <?php echo $model->_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>