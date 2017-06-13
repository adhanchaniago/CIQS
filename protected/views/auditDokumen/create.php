<?php
/* @var $this AuditDokumenController */
/* @var $model AuditDokumen */
?>

<?php
$this->breadcrumbs=array(
	'Audit Dokumens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AuditDokumen', 'url'=>array('index')),
	array('label'=>'Manage AuditDokumen', 'url'=>array('admin')),
);
?>

<h1>Create AuditDokumen</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>