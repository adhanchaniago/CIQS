<?php
/* @var $this PengajuanController */
/* @var $model Pengajuan */
?>

<?php
$this->breadcrumbs=array(
	'Pengajuan'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pengajuan', 'url'=>array('index')),
	array('label'=>'Manage Pengajuan', 'url'=>array('admin')),
);
?>

<h1>Create Pengajuan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>