<?php
/* @var $this CdController */
/* @var $model Cd */
?>

<?php
$this->breadcrumbs=array(
	'Cds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cd', 'url'=>array('index')),
	array('label'=>'Manage Cd', 'url'=>array('admin')),
);
?>

<h1>Create Cd</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'asDialog'=>$_GET['asDialog'])); ?>