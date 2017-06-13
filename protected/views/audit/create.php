<?php
/* @var $this AuditController */
/* @var $model Audit */
?>

<?php
$this->breadcrumbs=array(
	'Audits'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Audit', 'url'=>array('index')),
	array('label'=>'Manage Audit', 'url'=>array('admin')),
);
?>

<h1>Create Audit</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>