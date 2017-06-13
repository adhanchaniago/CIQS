<?php
/* @var $this QDokumenController */
/* @var $model QDokumen */
?>

<?php
$this->breadcrumbs=array(
	'Qdokumens'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List QDokumen', 'url'=>array('index')),
	array('label'=>'Create QDokumen', 'url'=>array('create')),
	array('label'=>'Update QDokumen', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QDokumen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QDokumen', 'url'=>array('admin')),
);
?>

<h1>View QDokumen #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'question',
		'type',
	),
)); ?>