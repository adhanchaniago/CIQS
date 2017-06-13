<?php
/* @var $this AuditDokumenController */
/* @var $model AuditDokumen */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'audit',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textAreaControlGroup($model,'temuan',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'tindakan',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'updated',array('span'=>5)); ?>

                    <?php echo $form->textAreaControlGroup($model,'evidence',array('rows'=>6,'span'=>8)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->