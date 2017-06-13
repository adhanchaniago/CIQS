<?php
/* @var $this AuditorController */
/* @var $model Auditor */
?>

<?php
$this->breadcrumbs=array(
	'Auditors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Auditor', 'url'=>array('index')),
	array('label'=>'Create Auditor', 'url'=>array('create')),
	array('label'=>'Update Auditor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Auditor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Auditor', 'url'=>array('admin')),
);
?>

<h1>View Auditor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'nama',
		'alamat',
		'telp',
		'email',
		'username',
		'password',
		'updated',
	),
)); ?>