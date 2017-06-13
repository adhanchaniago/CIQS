<?php
/* @var $this PengajuanController */
/* @var $data Pengajuan */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mitra')); ?>:</b>
	<?php echo CHtml::encode($data->mitra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_bayar')); ?>:</b>
	<?php echo CHtml::encode($data->status_bayar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bukti_bayar')); ?>:</b>
	<?php echo CHtml::encode($data->bukti_bayar); ?>
	<br />


</div>