<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" />
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<?php Yii::app()->bootstrap->register(); ?>
	
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar', array(
	//'color' => TbHtml::NAVBAR_COLOR_INVERSE,
	'brandLabel' => CHtml::encode(Yii::app()->name),
	//'display' => null, // default is static to top
	'collapse' => true,
	'items' => array(
	array(
		'class' => 'bootstrap.widgets.TbNav',
		'items' => array(
			array('label'=>'Home', 'url'=>array('/site/index')),
			array('label'=>'Bootcamp', 'url'=>array('/pengajuan/index'),'visible'=>Yii::app()->user->checkAccess('MITRA') || Yii::app()->user->checkAccess('ADMIN MARKETING') || Yii::app()->user->checkAccess('MGR. Q&A') || Yii::app()->user->checkAccess('KORD. AUDITOR')),
			array('label'=>'Profil Mitra', 'url'=>array('/mitra/addBiodata'),'visible'=>Yii::app()->user->checkAccess('MITRA')),
			//array('label'=>'Instruktur', 'url'=>array('/instruktur/index'),'visible'=>Yii::app()->user->checkAccess('ADMINISTRATOR')),
			//array('label'=>'Mitra', 'url'=>array('/mitra/index'),'visible'=>Yii::app()->user->checkAccess('ADMIN MARKETING')),
			//array('label'=>'User', 'url'=>array('/user/index'), 'visible'=>Yii::app()->user->checkAccess('ADMINISTRATOR')),
			array('label' => 'Master', 'items' => array(
				array('label'=>'Auditor', 'url'=>array('/auditor/index'),'visible'=>Yii::app()->user->checkAccess('ADMINISTRATOR')),
				array('label'=>'Instruktur', 'url'=>array('/instruktur/index'),'visible'=>Yii::app()->user->checkAccess('ADMINISTRATOR')),
				array('label'=>'Mitra', 'url'=>array('/mitra/index')),
				array('label'=>'Question', 'url'=>array('/qDokumen/index'),'visible'=>Yii::app()->user->checkAccess('ADMINISTRATOR')),
				array('label'=>'User', 'url'=>array('/user/index'), 'visible'=>Yii::app()->user->checkAccess('ADMINISTRATOR')),
			),'visible'=>Yii::app()->user->checkAccess('ADMIN MARKETING')),
			array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
			array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		),
	),
)); ?>

<div class="container" id="page">
    
    <div id="header">
        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
        <?php endif ?>
    </div>
    
    <style>
		h1{
			font-size:1.9em;
		}
	</style>
    
    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">
        Copyright &copy; <?php echo date('Y'); ?> by telkom<br/>
        All Rights Reserved.<br/>
        <?php echo Yii::powered(); ?>
    </div><!-- footer -->

</div><!-- page -->

</body>
</html>
