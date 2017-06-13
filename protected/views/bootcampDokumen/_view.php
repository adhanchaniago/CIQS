<?php
/* @var $this BootcampDokumenController */
/* @var $data BootcampDokumen */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bootcamp')); ?>:</b>
	<?php echo CHtml::encode($data->bootcamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('q_dokumen')); ?>:</b>
	<?php echo CHtml::encode($data->q_dokumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer')); ?>:</b>
	<?php echo CHtml::encode($data->answer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />


</div>