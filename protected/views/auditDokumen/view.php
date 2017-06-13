<?php
/* @var $this AuditDokumenController */
/* @var $model AuditDokumen */
?>

<?php
$this->breadcrumbs=array(
	'Audit Dokumens'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AuditDokumen', 'url'=>array('index')),
	array('label'=>'Create AuditDokumen', 'url'=>array('create')),
	array('label'=>'Update AuditDokumen', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AuditDokumen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AuditDokumen', 'url'=>array('admin')),
);
?>

<h1>View AuditDokumen #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'audit',
		'temuan',
		'tindakan',
		'updated',
		'evidence',
	),
)); ?>