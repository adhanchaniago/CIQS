<?php

/**
 * This is the model class for table "mitra".
 *
 * The followings are the available columns in table 'mitra':
 * @property string $id
 * @property string $nama
 * @property string $alamat
 * @property string $telepon
 * @property string $email
 * @property string $npwp
 * @property string $username
 * @property string $password
 * @property string $updated
 * @property string $fax
 * @property string $dirut
 * @property string $mr
 * @property string $bidang_usaha
 *
 * The followings are the available model relations:
 * @property Pengajuan[] $pengajuans
 */
class Mitra extends CActiveRecord
{
	public $password2;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Mitra the static model class
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
		return 'mitra';
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
			array('persetujuan', 'numerical', 'integerOnly'=>true),
			array('nama, telepon, npwp, username', 'length', 'max'=>45),
			array('email, fax', 'length', 'max'=>50),
			array('email','email'),
			array('dirut, mr, bidang_usaha', 'length', 'max'=>100),
			array('password','length','max'=>64, 'min'=>6),
            array('password2','length','max'=>64, 'min'=>6),
			// compare password to repeated password
            array('password', 'compare', 'compareAttribute'=>'password2','on' => 'insert'),
			array('password', 'compare', 'compareAttribute'=>'password2','on' => 'update'),
			array('username', 'unique','on'=>'insert'),
			array(
				'username',
				'match', 'not' => true, 'pattern' => '/[^a-zA-Z0-9_-]/',
				'message' => 'Invalid characters in username.',
			),
			array('alamat', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, alamat, telepon, email, npwp, username, password, updated, fax, dirut, mr, bidang_usaha', 'safe', 'on'=>'search'),
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
			'pengajuans' => array(self::HAS_MANY, 'Pengajuan', 'mitra'),
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
			'telepon' => 'Telepon',
			'email' => 'Email',
			'npwp' => 'Npwp',
			'username' => 'Username',
			'password' => 'Password',
			'updated' => 'Updated',
			'fax' => 'Fax',
			'dirut' => 'Dirut',
			'mr' => 'Mr',
			'bidang_usaha' => 'Bidang Usaha',
			'persetujuan' => 'Persetujuan',
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
		$criteria->compare('telepon',$this->telepon,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('npwp',$this->npwp,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('dirut',$this->dirut,true);
		$criteria->compare('mr',$this->mr,true);
		$criteria->compare('bidang_usaha',$this->bidang_usaha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}