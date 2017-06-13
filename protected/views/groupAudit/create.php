<?php
/* @var $this GroupAuditController */
/* @var $model GroupAudit */
?>

<?php
$this->breadcrumbs=array(
	'Group Audits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GroupAudit', 'url'=>array('index')),
	array('label'=>'Manage GroupAudit', 'url'=>array('admin')),
);
?>

<h1>Create GroupAudit</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>