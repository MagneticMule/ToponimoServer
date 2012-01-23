<?php
$this->breadcrumbs=array(
	'Wordnet Lexrels'=>array('index'),
	$model->_id=>array('view','id'=>$model->_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WordnetLexrel', 'url'=>array('index')),
	array('label'=>'Create WordnetLexrel', 'url'=>array('create')),
	array('label'=>'View WordnetLexrel', 'url'=>array('view', 'id'=>$model->_id)),
	array('label'=>'Manage WordnetLexrel', 'url'=>array('admin')),
);
?>

<h1>Update WordnetLexrel <?php echo $model->_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>