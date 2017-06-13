<?php
/* @var $this BootcampController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Bootcamps',
);

$this->menu=array(
	array('label'=>'Create Bootcamp','url'=>array('create')),
	array('label'=>'Manage Bootcamp','url'=>array('admin')),
);
?>

<h1>Bootcamps</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>