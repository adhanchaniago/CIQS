<?php

/**
 * This is the model class for table "participant".
 *
 * The followings are the available columns in table 'participant':
 * @property string $id
 * @property string $nama
 * @property string $telp
 * @property string $email
 * @property string $pengajuan
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Pengajuan $pengajuan0
 */
class Participant extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Participant the static model class
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
		return 'participant';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, pengajuan, updated', 'required'),
			array('nama, telp, email', 'length', 'max'=>45),
			array('pengajuan', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, telp, email, pengajuan, updated', 'safe', 'on'=>'search'),
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
			'pengajuan0' => array(self::BELONGS_TO, 'Pengajuan', 'pengajuan'),
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
			'telp' => 'Telp',
			'email' => 'Email',
			'pengajuan' => 'Pengajuan',
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
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('pengajuan',$this->pengajuan,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}