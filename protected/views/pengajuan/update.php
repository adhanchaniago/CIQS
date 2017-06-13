<?php
/* @var $this PengajuanController */
/* @var $model Pengajuan */
?>

<?php
$this->breadcrumbs=array(
	'Pengajuans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pengajuan', 'url'=>array('index')),
	array('label'=>'Create Pengajuan', 'url'=>array('create')),
	array('label'=>'View Pengajuan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pengajuan', 'url'=>array('admin')),
);
?>

    <h1>Update Pengajuan <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelParticipant'=>$modelParticipant)); ?>