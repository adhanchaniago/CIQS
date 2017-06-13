<?php

class PengajuanController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','index','view','audit','addAudit','checkDocument'),
				'roles'=>array('MITRA'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','index','view','checkDocument'),
				'roles'=>array('MGR. Q&A'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','index','view','update','audit','checkDocument'),
				'roles'=>array('KORD. AUDITOR'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','update','index','view'),
				'roles'=>array('ADMIN MARKETING'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionAudit($id){
		$model=new Pengajuan('audit');
		$model->unsetAttributes();  // clear any default values
		$model->parent = $id;
		if (isset($_GET['Pengajuan'])) {
			$model->attributes=$_GET['Pengajuan'];
		}

		$typeAudit = $model->findByAttributes(array('type'=>'AUDIT','parent'=>$id));

		$this->render('adminAudit',array(
			'model'=>$model,
			'typeAudit'=>$typeAudit,
		));
	}
	
	public function actionAddAudit(){
		
		$mitra = Mitra::model()->findByAttributes(array('username'=>Yii::app()->user->id));
		
		$model = new Pengajuan;
		$model->mitra = $mitra->id;
		$model->updated = date('Y-m-d H:i:s');
		$model->type = 'AUDIT';
		$model->status_bayar = 0;
		$model->parent = $_POST['id'];
		$model->save();
	}
	
	public function actionCheckDocument($id){
		$criteria = new CDbCriteria;
		$criteria->select = 'q.id,q.question,b.answer,b.q_dokumen';
		$criteria->join = 'RIGHT JOIN q_dokumen q ON q.id = b.q_dokumen';
		$criteria->condition = 'b.bootcamp = '.$id;
		$criteria->alias = 'b';
		$model = BootcampDokumen::model()->findAll($criteria);
		$new = 0;
		
		if(empty($model)){
			$criteria->condition = '';
			$model = BootcampDokumen::model()->findAll($criteria);
			$new = 1;
		}
		
		if(isset($_POST['BootcampDokumen'])){
			if($new == 1){
				foreach($_POST['BootcampDokumen'] as $row=>$value){
					$modelBD = new BootcampDokumen;
					$modelBD->bootcamp = $id;
					$modelBD->q_dokumen = $row;
					$modelBD->answer = $value;
					$modelBD->updated = date('Y-m-d H:i:s');
					$modelBD->save();
				}
			}else{
				$model = BootcampDokumen::model()->findAllByAttributes(array('bootcamp'=>$id));
				foreach($model as $row=>$value){
					$value->answer = $_POST['BootcampDokumen'][$row+1];
					$value->updated = date('Y-m-d H:i:s');
					$value->save();
				}
			}
			$this->redirect(array('checkDocument','id'=>$id));
		}
		
		$bootcamp = Bootcamp::model()->findByPk($id);
		
		$this->render('checkDocument',array(
			'model'=>$model,
			'bootcamp'=>$bootcamp,
		));
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		//----- begin new code --------------------
		if (!empty($_GET['asDialog']))
			$this->layout='//layouts/iframe';
		//----- end new code --------------------
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pengajuan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		//if (isset($_POST['Pengajuan'])) {
		if (isset($_POST['save'])) {
			$mitra = Mitra::model()->findByAttributes(array('username'=>Yii::app()->user->id));
			
			//$model->attributes=$_POST['Pengajuan'];
			$model->mitra = $mitra->id;
			$model->type = 'BOOTCAMP';
			$model->status_bayar = 0;
			$model->updated = date('Y-m-d H:i:s');
			if ($model->save()) {
				
				$pengajuan = $model->id;
				
				foreach($_POST['participants'] as $row=>$value){
					$modelParticipant = new Participant;
					$modelParticipant->nama = $value;
					$modelParticipant->email = $_POST['email'][$row];
					$modelParticipant->telp = $_POST['telp'][$row];
					$modelParticipant->pengajuan = $pengajuan;
					$modelParticipant->updated = date('Y-m-d H:i:s');
					$modelParticipant->save();
				}
				
				//----- begin new code --------------------
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					
					// Check IE browser
					$msie = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
					// IE
					if($msie){
						echo CHtml::script("window.parent.$('#cru-dialog').dialog('close');window.parent.$('#cru-frame').attr('src','');window.parent.$.fn.yiiGridView.update('".$_GET['gridId']."');");
					}else{
						echo CHtml::script("window.parent.$('#modal').modal('hide');window.parent.$('#new-cru-frame').attr('src','');window.parent.$.fn.yiiGridView.update('".$_GET['gridId']."');");
					}
					Yii::app()->end();
				}
				else
				//----- end new code --------------------
				
				$this->redirect(array('view','id'=>$model->id,'asDialog'=>$_GET['asDialog']));
			}
		}
		
		//----- begin new code --------------------
		if (!empty($_GET['asDialog']))
			$this->layout='//layouts/iframe';
		//----- end new code --------------------

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{	
		$model=$this->loadModel($id);
		$modelParticipant = Participant::model()->findAllByAttributes(array('pengajuan'=>$model->id));
		
		if(isset($_GET['scenario'])){
			if($_GET['scenario'] == 'upload'){
				$model->scenario = 'upload';
			}else if($_GET['scenario'] == 'changeStatusBootcamp'){
				$model->scenario = 'changeStatusBootcamp';
				$model->status_bayar = 1;
				$model->updated = date('Y-m-d H:i:s');
				if($model->save()){
					$this->redirect(array('index'));
				}
			}
			else if($_GET['scenario'] == 'changeStatusAudit'){
				$model->scenario = 'changeStatusAudit';
				$model->status_bayar = 1;
				$model->updated = date('Y-m-d H:i:s');
				if($model->save()){
					$this->redirect(array('audit','id'=>$model->parent));
				}
			}
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		//if (isset($_POST['Pengajuan'])) {
		if (isset($_POST['save'])) {
			if (isset($_POST['Pengajuan'])){
				$model->attributes=$_POST['Pengajuan'];
				$model->updated = date('Y-m-d H:i:s');
			}
			
			$mitra = Mitra::model()->findByAttributes(array('username'=>Yii::app()->user->id));
			
			//$model->attributes=$_POST['Pengajuan'];
			//$model->updated = date('Y-m-d H:i:s');
			if ($model->save()) {
				
				if(isset($_POST['participants'])){
					foreach($_POST['participants'] as $row=>$value){
						$modelParticipant = Participant::model()->findByPk($_POST['id'][$row]);
						if(empty($modelParticipant)){
							$modelParticipant = new Participant;
						}
						$modelParticipant->pengajuan = $model->id;
						$modelParticipant->nama = $value;
						$modelParticipant->email = $_POST['email'][$row];
						$modelParticipant->telp = $_POST['telp'][$row];
						$modelParticipant->updated = date('Y-m-d H:i:s');
						$modelParticipant->save();
					}
				}
				
				//----- begin new code --------------------
				if (!empty($_GET['asDialog']))
				{
					//Close the dialog, reset the iframe and update the grid
					
					// Check IE browser
					$msie = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') ? true : false;
					// IE
					if($msie){
						echo CHtml::script("window.parent.$('#cru-dialog').dialog('close');window.parent.$('#cru-frame').attr('src','');window.parent.$.fn.yiiGridView.update('".$_GET['gridId']."');");
					}else{
						echo CHtml::script("window.parent.$('#modal').modal('hide');window.parent.$('#new-cru-frame').attr('src','');window.parent.$.fn.yiiGridView.update('".$_GET['gridId']."');");
					}
					Yii::app()->end();
				}
				else
				//----- end new code --------------------
				
				$this->redirect(array('view','id'=>$model->id,'asDialog'=>$_GET['asDialog']));
			}
		}
		
		//----- begin new code --------------------
		if (!empty($_GET['asDialog']))
			$this->layout='//layouts/iframe';
		//----- end new code --------------------

		$this->render('update',array(
			'model'=>$model,
			'modelParticipant'=>$modelParticipant,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('Pengajuan');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		
		if(Yii::app()->user->checkAccess('MITRA') && !Yii::app()->user->checkAccess('ADMINISTRATOR')){
			$mitra = Mitra::model()->findByAttributes(array('username'=>Yii::app()->user->id));
			if($mitra->persetujuan == 0){
				if(isset($_POST['persetujuan'])){
					$mitra->scenario = 'persetujuan';
					$mitra->persetujuan = 1;
					
					if($mitra->save()){
						$this->redirect(array('mitra/addBiodata'));
					}
				}
				$this->render('persetujuan',array(
				));
			}else if(
				$mitra->alamat == '' && $mitra->telepon == '' && $mitra->email == '' &&
				$mitra->npwp == '' && $mitra->fax == '' && $mitra->dirut == '' &&
				$mitra->mr == '' && $mitra->bidang_usaha == ''
				){
				$this->redirect(array('mitra/addBiodata'));
			}
		}
		
		$model=new Pengajuan('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Pengajuan'])) {
			$model->attributes=$_GET['Pengajuan'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pengajuan('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Pengajuan'])) {
			$model->attributes=$_GET['Pengajuan'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pengajuan the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pengajuan::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pengajuan $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='pengajuan-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}