<?php

/**
 * This is the model class for table "tbl_register".
 *
 * The followings are the available columns in table 'tbl_register':
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $repassword
 * @property integer $id
 */
class Register extends CActiveRecord
{
    
    public $rememberMe;    
    private $_identity;
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_register';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		    
			array('id', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>255),
		    // rememberMe needs to be a boolean
		    array('rememberMe', 'boolean'),		    
			array('username', 'length', 'max'=>20),
			array('password, repassword', 'length', 'max'=>30),
		    array('username', 'required', 'message'=>'用户名必填'),
		    array('password', 'required', 'message'=>'密码必填'),
		    array('repassword', 'required', 'message'=>'确认密码必填', 'on' => 'register'),
		    array('email', 'required', 'message'=>'邮箱必填', 'on' => 'register'),
		    array('password', 'compare', 'compareAttribute'=>'repassword', 
		          'operator'=>'==', 'message'=>'密码与确认密码必须相同', 'on' => 'register'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('email, username, password, repassword, id', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'email' => '邮箱',
			'username' => '用户名',
			'password' => '密码',
			'repassword' => '确认密码',
		    'rememberMe'=>'记住我的选择',
			'id' => 'ID',
		);
	}

	
	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
//	    var_dump($this->hasErrors());
	    if(!$this->hasErrors())
	    {
	        $this->_identity=new UserIdentity($this->username,$this->password);
        
	        if(!$this->_identity->authenticate())
	            //$this->addError('password','Incorrect username or password.');
	            $this->addError('password','用户名或密码不存在');
	    }
	}	
	
	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
	    if($this->_identity===null)
	    {
	        $this->_identity=new UserIdentity($this->username,$this->password);
//var_dump($this->username);
	        $this->_identity->authenticate();
	    }
	    if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
	    {
	        $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
	        Yii::app()->user->login($this->_identity,$duration);
	        return true;
	    }
	    else
	        return false;
	}	
	
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('repassword',$this->repassword,true);
		$criteria->compare('id',$this->id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * 根据用户名查重
	 */
/* 	public function cmpUsr()
	{
	    $compare = Register::model()->findByPk($this->username);
	    if($compare)
	    {
	        return false;
	    }
	    return true;
	}
	 */
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Register the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
