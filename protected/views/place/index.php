<?php
/*
$this->breadcrumbs=array(
	'Places',
);
*/


$this->menu=array(
	array('label'=>'Create Place', 'url'=>array('create')),
	array('label'=>'Manage Place', 'url'=>array('admin')),
);
?>



<h1>Places</h1>
<form method="get">
<input type="search" placeholder="search" name="q" value="<?=isset($_GET['q']) ? CHtml::encode($_GET['q']) : '' ; ?>" />
<input type="submit" value="search" />
</form>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

