<?php
/* @var $this PengajuanController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Pengajuans',
);

$this->menu=array(
	array('label'=>'Create Pengajuan','url'=>array('create')),
	array('label'=>'Manage Pengajuan','url'=>array('admin')),
);
?>

<h1>Pengajuans</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>