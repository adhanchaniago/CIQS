<?php
/* @var $this AuditDokumenController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Audit Dokumens',
);

$this->menu=array(
	array('label'=>'Create AuditDokumen','url'=>array('create')),
	array('label'=>'Manage AuditDokumen','url'=>array('admin')),
);
?>

<h1>Audit Dokumens</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>