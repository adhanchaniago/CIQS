<?php
/* @var $this BootcampController */
/* @var $model Bootcamp */
?>

<?php
$this->breadcrumbs=array(
	'Bootcamps'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Bootcamp', 'url'=>array('index')),
	array('label'=>'Create Bootcamp', 'url'=>array('create')),
	array('label'=>'Update Bootcamp', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Bootcamp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bootcamp', 'url'=>array('admin')),
);
?>

<h1>View Bootcamp #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'tgl_mulai',
		'tgl_selesai',
		'lokasi',
		'pengajuan',
		'updated',
		'instruktur',
	),
)); ?>