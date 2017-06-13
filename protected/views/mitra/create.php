<?php
/* @var $this MitraController */
/* @var $model Mitra */
?>

<?php
$this->breadcrumbs=array(
	'Mitras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Mitra', 'url'=>array('index')),
	array('label'=>'Manage Mitra', 'url'=>array('admin')),
);
?>

<h1>Create Mitra</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>