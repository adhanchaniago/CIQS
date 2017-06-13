<?php
/* @var $this MitraController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Mitras',
);

$this->menu=array(
	array('label'=>'Create Mitra','url'=>array('create')),
	array('label'=>'Manage Mitra','url'=>array('admin')),
);
?>

<h1>Mitras</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>