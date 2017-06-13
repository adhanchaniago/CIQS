<?php
/* @var $this ParticipantController */
/* @var $model Participant */
?>

<?php
$this->breadcrumbs=array(
	'Participants'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Participant', 'url'=>array('index')),
	array('label'=>'Manage Participant', 'url'=>array('admin')),
);
?>

<h1>Create Participant</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>