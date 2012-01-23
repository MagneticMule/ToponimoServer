<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->_id,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'_id',
		'username',
		'salt',
		'first_name',
		'middle_initial',
		'last_name',
		'd_o_b',
		'address_1',
		'address_2',
		'city',
		'region',
		'country',
		'email',
		'mob_phone',
	),
)); ?>
