<?php
/* @var $this PengajuanController */
/* @var $model Pengajuan */
?>

<?php
$this->breadcrumbs=array(
	'Pengajuans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pengajuan', 'url'=>array('index')),
	array('label'=>'Create Pengajuan', 'url'=>array('create')),
	array('label'=>'Update Pengajuan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pengajuan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pengajuan', 'url'=>array('admin')),
);
?>

<h1>View Pengajuan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'mitra',
		'updated',
		'type',
		'status_bayar',
		'bukti_bayar',
	),
)); ?>