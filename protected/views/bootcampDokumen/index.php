<?php
/* @var $this BootcampDokumenController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Bootcamp Dokumens',
);

$this->menu=array(
	array('label'=>'Create BootcampDokumen','url'=>array('create')),
	array('label'=>'Manage BootcampDokumen','url'=>array('admin')),
);
?>

<h1>Bootcamp Dokumens</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>