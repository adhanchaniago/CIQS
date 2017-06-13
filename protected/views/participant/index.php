<?php
/* @var $this ParticipantController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Participants',
);

$this->menu=array(
	array('label'=>'Create Participant','url'=>array('create')),
	array('label'=>'Manage Participant','url'=>array('admin')),
);
?>

<h1>Participants</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>