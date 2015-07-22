<?php

class BusinessInfController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','login','register','business', 'activity'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	/**
	 * 商家登录
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionLogin()
	{
		//$model=new LoginForm();
		$model = new Register();
		$model->unsetAttributes();  // clear any default values
//var_dump($_POST['LoginForm']);
		if(isset($_POST['Register']))
		{
		    $model->attributes=$_POST['Register'];		    
		}
//var_dump($model->login());
		$user = Register::model()->find('username=:username AND password=:password',
		    array(':username'=>$model->attributes['username'], 
		        ':password'=>$model->attributes['password']));
//var_dump($user);
		if($model->validate() && !$model->login())
		{
		    //$this->redirect(Yii::app()->user->returnUrl);

		    //$this->redirect(array("./index.php?r=businessInf/business", 'post' => $post));
		    //$this->render('business', array('post' => $post));
		    $this->redirect(array('business', 'usr' => $model->username));
		}
		$this->render('login',array(
			'model'=>$model,
		));
	}

	/**
	 * 商家注册
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionRegister()
	{
	    $model=new Register('search');
	    $model->unsetAttributes();  // clear any default values
//var_dump($model->username);
	    if(isset($_POST['Register']))
	    {
	        $model->attributes=$_POST['Register'];
	    }
//var_dump($model->attributes['username']);
	 	$user = Register::model()->find('username=:username', 
	            array(':username'=>$model->attributes['username']));
	    if($model->validate() && !$user)
	    {
	        $model->save();
	        $this->redirect("./index.php?r=businessInf/login");
	    }

	    $this->render('register',array(
	        'model'=>$model,
	    ));
	}
	
	/**
	 * 商家登录后的信息
	 */
	public function actionBusiness()
	{
//	    $model=new Register();
        $username = $_GET['usr'];
        /**根据获取到的用户名信息，在tbl_register数据库中查找用户名对应的其他数据*/
        $register_data= Register::model()->find('username=:username', array(':username'=>$username));
        
        $model = new Activity();
        /**根据获取到的用户名信息，在tbl_activity数据库中查找用户名对应的其他数据*/
        $activity_data= Activity::model()->findAll('username=:username', array(':username'=>$username));
//var_dump($activity_data);
	    $this->render('business',array(
	        'register_data'=>$register_data,
	        'activity_data'=>$activity_data,
	    ));
	}
	
	/**
	 * 创建活动信息
	 */
	public function actionActivity()
	{
		$model=new Activity('search');
	    $model->unsetAttributes();  // clear any default values
//var_dump($model->username);
	    if(isset($_POST['Activity']))
	    {
	        $model->attributes=$_POST['Activity'];
	    }
	    $username = $_GET['usr'];
	    $model->username = $username;
	    
	    /**将获取到的日期转换为datetime格式*/
	    //$start_time = date_parse_from_format("Y-m-d H:i:s", $model->start_time);
	    //$end_time = date_parse_from_format("Y-m-d H:i:s", $model->end_time);
/* 	    $start_time = strtotime($model->start_time);
	    $end_time = strtotime($model->end_time);
	    $model->start_time = $start_time;
	    $model->end_time = $end_time; */
	    //var_dump($model->start_time); exit();
	    
	    if($model->validate())
	    {
	        $model->save();
	        $this->redirect(array('business', 'usr' => $username));
	    }	    
	    
	    $this->render('activity',array(
	        'model'=>$model,
	    ));
	}
	
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new BusinessInf;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BusinessInf']))
		{
			$model->attributes=$_POST['BusinessInf'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BusinessInf']))
		{
			$model->attributes=$_POST['BusinessInf'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('BusinessInf');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BusinessInf('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BusinessInf']))
			$model->attributes=$_GET['BusinessInf'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BusinessInf the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BusinessInf::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BusinessInf $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='business-inf-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
