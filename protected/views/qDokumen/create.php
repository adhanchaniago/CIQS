<?php
/* @var $this QDokumenController */
/* @var $model QDokumen */
?>

<?php
$this->breadcrumbs=array(
	'Qdokumens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QDokumen', 'url'=>array('index')),
	array('label'=>'Manage QDokumen', 'url'=>array('admin')),
);
?>

<h1>Create QDokumen</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>