<?php

/**
 * This is the model class for table "auditor".
 *
 * The followings are the available columns in table 'auditor':
 * @property string $id
 * @property string $nama
 * @property string $alamat
 * @property string $telp
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property GroupAudit[] $groupAudits
 */
class Auditor extends CActiveRecord
{
	public $password2;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Auditor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'auditor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, username, password, updated', 'required'),
			array('nama, telp, email, username', 'length', 'max'=>45),
			array('password','length','max'=>64, 'min'=>6),
            array('password2','length','max'=>64, 'min'=>6),
			// compare password to repeated password
            array('password', 'compare', 'compareAttribute'=>'password2'),
			array('username', 'unique','on'=>'insert'),
			array('email', 'email'),
			array(
				'username',
				'match', 'not' => true, 'pattern' => '/[^a-zA-Z0-9_-]/',
				'message' => 'Invalid characters in username.',
			),
			array('alamat', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, alamat, telp, email, username, password, updated', 'safe', 'on'=>'search'),
		);
	}
	
	public function beforeSave(){
		$pass = md5(md5($this->password).Yii::app()->params["salt"]);
		$this->password = $pass;
		return true;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'groupAudits' => array(self::HAS_MANY, 'GroupAudit', 'auditor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'telp' => 'Telp',
			'email' => 'Email',
			'username' => 'Username',
			'password' => 'Password',
			'updated' => 'Updated',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}