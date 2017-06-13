<?php

/**
 * This is the model class for table "cd".
 *
 * The followings are the available columns in table 'cd':
 * @property integer $kode_cd
 * @property string $judul
 * @property string $kategori
 * @property integer $stok
 * @property integer $harga
 * @property string $sampul
 * @property string $nama_sampul
 */
class Cd extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cd the static model class
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
		return 'cd';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('judul, kategori', 'required'),
			array('stok, harga', 'numerical', 'integerOnly'=>true),
			array('judul', 'length', 'max'=>50),
			array('kategori', 'length', 'max'=>25),
			array('nama_sampul', 'length', 'max'=>45),
			array('sampul', 'file', 'types'=>'jpg','maxSize'=>550000, 'tooLarge'=>'Max size is 500kb','on'=>'insert'),
			array('sampul', 'file', 'allowEmpty'=>true,'types'=>'jpg','maxSize'=>550000, 'tooLarge'=>'Max size is 500kb','on'=>'update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kode_cd, judul, kategori, stok, harga, sampul, nama_sampul', 'safe', 'on'=>'search'),
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
			'kode_cd' => 'Kode Cd',
			'judul' => 'Judul',
			'kategori' => 'Kategori',
			'stok' => 'Stok',
			'harga' => 'Harga',
			'sampul' => 'Sampul',
			'nama_sampul' => 'Nama Sampul',
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

		$criteria->compare('kode_cd',$this->kode_cd);
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('kategori',$this->kategori,true);
		$criteria->compare('stok',$this->stok);
		$criteria->compare('harga',$this->harga);
		$criteria->compare('sampul',$this->sampul,true);
		$criteria->compare('nama_sampul',$this->nama_sampul,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeValidate()
    {
	    if($sampul=CUploadedFile::getInstance($this,'sampul'))
        {
            $this->nama_sampul=$sampul->name;
            $this->sampul=file_get_contents($sampul->tempName);
        }
		
		return parent::beforeValidate();
	}
}