<?php
$this->breadcrumbs=array(
	'Pengajuan'=>array('index'),
	'Bootcamp'=>array('index'),
	'Check Dokumen',
);

?>

<h1>Check Bootcamp Dokumen</h1>

<fieldset>
	<legend>Detail Bootcamp</legend>
    <p>
    	<?php
			echo "<b>Tanggal Mulai</b> : ".$bootcamp->tgl_mulai."<br>";
			echo "<b>Tanggal Selesai</b> : ".$bootcamp->tgl_selesai."<br>";
			echo "<b>Lokasi</b> : ".$bootcamp->lokasi."<br>";
			echo "<b>Instruktur</b> : ".$bootcamp->instruktur0->nama."<br>";
		?>
    </p>
</fieldset>
<hr />

<h3>Question</h3>

<?php
	if(Yii::app()->user->checkAccess('MGR. Q&A')){ ?>
    <div class="form">
        <?php echo CHtml::beginForm(); ?>
    
        <?php
            foreach($model as $row){
                echo "<p class='span4'>";
                    echo CHtml::activeCheckBox($row,'answer',array('name'=>'BootcampDokumen['.$row->id.']'));
                    echo " : ".$row->question;
                echo "</p>";
            }
        ?>
        <div class="clear"></div>
        
        <div class="form-actions">
            <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
                'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                'size'=>TbHtml::BUTTON_SIZE_LARGE,
            )); ?>
        </div>
        
        <?php echo CHtml::endForm(); ?>
    </div>
<?php
	}else if(Yii::app()->user->checkAccess('KORD. AUDITOR') || Yii::app()->user->checkAccess('MITRA')){ ?>
    	<?php
            foreach($model as $row){
                echo "<p class='span4'>";
                    echo CHtml::activeCheckBox($row,'answer',array('name'=>'BootcampDokumen['.$row->id.']','disabled'=>true));
                    echo " : ".$row->question;
                echo "</p>";
            }
        ?>
<?php
	}
?>