<?php

/**
 * This is the model class for table "bootcamp".
 *
 * The followings are the available columns in table 'bootcamp':
 * @property string $id
 * @property string $tgl_mulai
 * @property string $tgl_selesai
 * @property string $lokasi
 * @property string $pengajuan
 * @property string $updated
 * @property string $instruktur
 *
 * The followings are the available model relations:
 * @property Instruktur $instruktur0
 * @property Pengajuan $pengajuan0
 * @property BootcampDokumen[] $bootcampDokumens
 */
class Bootcamp extends CActiveRecord
{
	public $instruktur_name;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bootcamp the static model class
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
		return 'bootcamp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tgl_mulai, tgl_selesai, lokasi, pengajuan, updated, instruktur, instruktur_name', 'required'),
			array('lokasi', 'length', 'max'=>100),
			array('pengajuan, instruktur', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tgl_mulai, tgl_selesai, lokasi, pengajuan, updated, instruktur', 'safe', 'on'=>'search'),
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
			'instruktur0' => array(self::BELONGS_TO, 'Instruktur', 'instruktur'),
			'pengajuan0' => array(self::BELONGS_TO, 'Pengajuan', 'pengajuan'),
			'bootcampDokumens' => array(self::HAS_MANY, 'BootcampDokumen', 'bootcamp'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tgl_mulai' => 'Tgl Mulai',
			'tgl_selesai' => 'Tgl Selesai',
			'lokasi' => 'Lokasi',
			'pengajuan' => 'Pengajuan',
			'updated' => 'Updated',
			'instruktur' => 'Instruktur',
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
		$criteria->compare('tgl_mulai',$this->tgl_mulai,true);
		$criteria->compare('tgl_selesai',$this->tgl_selesai,true);
		$criteria->compare('lokasi',$this->lokasi,true);
		$criteria->compare('pengajuan',$this->pengajuan,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('instruktur',$this->instruktur,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}