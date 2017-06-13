<?php
/* @var $this AuditController */
/* @var $model Audit */
?>

<?php
$this->breadcrumbs=array(
	'Audits'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Audit', 'url'=>array('index')),
	array('label'=>'Create Audit', 'url'=>array('create')),
	array('label'=>'Update Audit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Audit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Audit', 'url'=>array('admin')),
);
?>

<h1>View Audit #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'tgl_mulai',
		'tgl_selesai',
		'pengajuan',
		'updated',
	),
)); ?>