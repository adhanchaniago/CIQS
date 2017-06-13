<?php
/* @var $this AuditorController */
/* @var $model Auditor */
?>

<?php
$this->breadcrumbs=array(
	'Auditors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Auditor', 'url'=>array('index')),
	array('label'=>'Manage Auditor', 'url'=>array('admin')),
);
?>

<h1>Create Auditor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>