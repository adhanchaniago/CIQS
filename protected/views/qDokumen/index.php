<?php
/* @var $this QDokumenController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Qdokumens',
);

$this->menu=array(
	array('label'=>'Create QDokumen','url'=>array('create')),
	array('label'=>'Manage QDokumen','url'=>array('admin')),
);
?>

<h1>Qdokumens</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>