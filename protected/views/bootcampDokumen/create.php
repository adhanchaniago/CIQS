<?php
/* @var $this BootcampDokumenController */
/* @var $model BootcampDokumen */
?>

<?php
$this->breadcrumbs=array(
	'Bootcamp Dokumens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BootcampDokumen', 'url'=>array('index')),
	array('label'=>'Manage BootcampDokumen', 'url'=>array('admin')),
);
?>

<h1>Create BootcampDokumen</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>