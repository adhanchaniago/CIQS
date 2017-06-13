<?php

class AuditController extends Controller
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
				'actions'=>array('admin','delete','create','update','index','view'),
				'roles'=>array('KORD. AUDITOR'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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
		$model=new Audit;
		if(isset($_GET['id'])){
			$model->pengajuan = $_GET['id'];
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Audit'])) {
			$model->attributes=$_POST['Audit'];
			$model->updated = date('Y-m-d H:i:s');
			if ($model->save()) {
				
				if(isset($_POST['auditors'])){
					foreach($_POST['auditors'] as $row){
						$modelGA = new GroupAudit;
						$modelGA->audit = $model->id;
						$modelGA->auditor = $row;
						$modelGA->updated = date('Y-m-d H:i:s');
						$modelGA->save();
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
		$modelGroupAudit = GroupAudit::model()->findAllByAttributes(array('audit'=>$model->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset($_POST['Audit'])) {
			$model->attributes=$_POST['Audit'];
			$model->updated = date('Y-m-d H:i:s');
			if ($model->save()) {
				
				if(isset($_POST['auditors'])){
					foreach($_POST['auditors'] as $row=>$value){
						$modelGroupAudit = GroupAudit::model()->findByPk($_POST['id'][$row]);
						if(empty($modelGroupAudit)){
							$modelGroupAudit = new GroupAudit;
						}
						$modelGroupAudit->auditor = $value;
						$modelGroupAudit->audit = $model->id;
						$modelGroupAudit->updated = date('Y-m-d H:i:s');
						$modelGroupAudit->save();
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
			'modelGroupAudit'=>$modelGroupAudit,
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
		/*$dataProvider=new CActiveDataProvider('Audit');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		$model=new Audit('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Audit'])) {
			$model->attributes=$_GET['Audit'];
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
		$model=new Audit('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Audit'])) {
			$model->attributes=$_GET['Audit'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Audit the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Audit::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Audit $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='audit-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}