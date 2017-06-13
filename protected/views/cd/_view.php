<?php
/* @var $this CdController */
/* @var $data Cd */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_cd')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->kode_cd),array('view','id'=>$data->kode_cd)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('judul')); ?>:</b>
	<?php echo CHtml::encode($data->judul); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kategori')); ?>:</b>
	<?php echo CHtml::encode($data->kategori); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stok')); ?>:</b>
	<?php echo CHtml::encode($data->stok); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga')); ?>:</b>
	<?php echo CHtml::encode($data->harga); ?>
	<br />


</div>