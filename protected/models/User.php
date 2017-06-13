<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $telp
 * @property string $level
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Level $level0
 */
class User extends CActiveRecord
{
	public $password2;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, nama, level, updated', 'required'),
			array('username, nama, telp', 'length', 'max'=>45),
			array('password','length','max'=>64, 'min'=>6),
            array('password2','length','max'=>64, 'min'=>6),
			// compare password to repeated password
            array('password', 'compare', 'compareAttribute'=>'password2'),
			array('level', 'length', 'max'=>10),
			array('username', 'unique','on'=>'insert'),
			array(
				'username',
				'match', 'not' => true, 'pattern' => '/[^a-zA-Z0-9_-]/',
				'message' => 'Invalid characters in username.',
			),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, nama, telp, level, updated', 'safe', 'on'=>'search'),
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
			'level0' => array(self::BELONGS_TO, 'Level', 'level'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'nama' => 'Nama',
			'telp' => 'Telp',
			'level' => 'Level',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}