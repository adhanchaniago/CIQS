<?php
/* @var $this GroupAuditController */
/* @var $data GroupAudit */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('audit')); ?>:</b>
	<?php echo CHtml::encode($data->audit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auditor')); ?>:</b>
	<?php echo CHtml::encode($data->auditor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated')); ?>:</b>
	<?php echo CHtml::encode($data->updated); ?>
	<br />


</div>