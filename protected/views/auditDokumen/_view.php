<?php
/* @var $this AuditDokumenController */
/* @var $data AuditDokumen */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('audit')); ?>:</b>
	<?php echo CHtml::encode($data->audit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temuan')); ?>:</b>
	<?php echo CHtml::encode($data->temuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tindakan')); ?>:</b>
	<?php echo CHtml::encode($data->tindakan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evidence')); ?>:</b>
	<?php echo CHtml::encode($data->evidence); ?>
	<br />


</div>