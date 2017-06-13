<?php
/* @var $this CdController */
/* @var $model Cd */
?>

<?php
$this->breadcrumbs=array(
	'Cds'=>array('index'),
	$model->kode_cd,
);

$this->menu=array(
	array('label'=>'List Cd', 'url'=>array('index')),
	array('label'=>'Create Cd', 'url'=>array('create')),
	array('label'=>'Update Cd', 'url'=>array('update', 'id'=>$model->kode_cd)),
	array('label'=>'Delete Cd', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->kode_cd),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cd', 'url'=>array('admin')),
);
?>

<h1>View Cd #<?php echo $model->kode_cd; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'kode_cd',
		'judul',
		'kategori',
		'stok',
		'harga',
		array(
			'label'=>'Sampul', 
			'type'=>'raw', 
			'value'=>CHtml::link(CHtml::image(Yii::app()->controller->createUrl('sampul', array('id'=>$model->kode_cd)), 'sampul', array('width'=>'100%')), array('cd/sampul','id'=>$model->kode_cd))),
	),
)); ?>