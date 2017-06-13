<?php
/* @var $this MitraController */
/* @var $model Mitra */
?>

<?php
$this->breadcrumbs=array(
	'Mitras'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Mitra', 'url'=>array('index')),
	array('label'=>'Create Mitra', 'url'=>array('create')),
	array('label'=>'Update Mitra', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Mitra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mitra', 'url'=>array('admin')),
);
?>

<h1>View Mitra #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'nama',
		'alamat',
		'telepon',
		'email',
		'npwp',
		'username',
		'password',
		'updated',
		'fax',
		'dirut',
		'mr',
		'bidang_usaha',
	),
)); ?>