<?php
/* @var $this BootcampDokumenController */
/* @var $model BootcampDokumen */
?>

<?php
$this->breadcrumbs=array(
	'Bootcamp Dokumens'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BootcampDokumen', 'url'=>array('index')),
	array('label'=>'Create BootcampDokumen', 'url'=>array('create')),
	array('label'=>'Update BootcampDokumen', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BootcampDokumen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BootcampDokumen', 'url'=>array('admin')),
);
?>

<h1>View BootcampDokumen #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'bootcamp',
		'q_dokumen',
		'answer',
		'updated',
	),
)); ?>