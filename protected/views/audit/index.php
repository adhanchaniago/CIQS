<?php
/* @var $this AuditController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Audits',
);

$this->menu=array(
	array('label'=>'Create Audit','url'=>array('create')),
	array('label'=>'Manage Audit','url'=>array('admin')),
);
?>

<h1>Audits</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>