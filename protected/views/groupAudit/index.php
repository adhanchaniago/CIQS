<?php
/* @var $this GroupAuditController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Group Audits',
);

$this->menu=array(
	array('label'=>'Create GroupAudit','url'=>array('create')),
	array('label'=>'Manage GroupAudit','url'=>array('admin')),
);
?>

<h1>Group Audits</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>