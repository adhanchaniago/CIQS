<?php
/* @var $this BootcampController */
/* @var $model Bootcamp */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'tgl_mulai',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'tgl_selesai',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'lokasi',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textFieldControlGroup($model,'pengajuan',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'updated',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'instruktur',array('span'=>5,'maxlength'=>10)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->