<?php
/* @var $this BootcampController */
/* @var $model Bootcamp */
?>

<?php
$this->breadcrumbs=array(
	'Bootcamps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bootcamp', 'url'=>array('index')),
	array('label'=>'Manage Bootcamp', 'url'=>array('admin')),
);
?>

<h1>Create Bootcamp</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>