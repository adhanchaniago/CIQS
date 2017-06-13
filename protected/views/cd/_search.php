<?php
/* @var $this CdController */
/* @var $model Cd */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'kode_cd',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'judul',array('span'=>5,'maxlength'=>50)); ?>

                    <?php echo $form->textFieldControlGroup($model,'kategori',array('span'=>5,'maxlength'=>25)); ?>

                    <?php echo $form->textFieldControlGroup($model,'stok',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'harga',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->