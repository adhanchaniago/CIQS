<?php

/**
 * This is the model class for table "pengajuan".
 *
 * The followings are the available columns in table 'pengajuan':
 * @property string $id
 * @property string $mitra
 * @property string $updated
 * @property string $type
 * @property string $status_bayar
 * @property string $bukti_bayar
 *
 * The followings are the available model relations:
 * @property Audit[] $audits
 * @property Bootcamp[] $bootcamps
 * @property Participant[] $participants
 * @property Mitra $mitra0
 */
class Pengajuan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pengajuan the static model class
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
		return 'pengajuan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mitra, updated, type, status_bayar', 'required'),
			array('mitra, status_bayar', 'length', 'max'=>10),
			array('type', 'length', 'max'=>45),
			array('parent', 'numerical', 'integerOnly'=>true),
			array('bukti_bayar', 'file', 'types'=>'pdf','maxSize'=>550000, 'allowEmpty'=>true, 'tooLarge'=>'Max size is 500kb', 'on'=>'upload'),
			array('bukti_bayar', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mitra, updated, type, status_bayar, bukti_bayar', 'safe', 'on'=>'search'),
			array('id, mitra, updated, type, status_bayar, bukti_bayar', 'safe', 'on'=>'audit'),
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
			//'audits' => array(self::HAS_MANY, 'Audit', 'pengajuan'),
			'audits' => array(self::HAS_ONE, 'Audit', 'pengajuan'),
			//'bootcamps' => array(self::HAS_MANY, 'Bootcamp', 'pengajuan'),
			'bootcamps' => array(self::HAS_ONE, 'Bootcamp', 'pengajuan'),
			'participants' => array(self::HAS_MANY, 'Participant', 'pengajuan'),
			'mitra0' => array(self::BELONGS_TO, 'Mitra', 'mitra'),
			'countParty' => array(self::STAT, 'Participant', 'pengajuan'),
		);
	}
	
	public function beforeValidate()
    {
	    if($bukti_bayar=CUploadedFile::getInstance($this,'bukti_bayar'))
        {
            $this->bukti_bayar=file_get_contents($bukti_bayar->tempName);
        }
		
		return parent::beforeValidate();
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'mitra' => 'Mitra',
			'updated' => 'Updated',
			'type' => 'Type',
			'status_bayar' => 'Status Bayar',
			'bukti_bayar' => 'Bukti Bayar',
			'countParty' => 'Participant',
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
		$mitra = Mitra::model()->findByAttributes(array('username'=>Yii::app()->user->id));
		if(!empty($mitra)){
			$criteria->compare('mitra',$mitra->id);
		}else{
			$criteria->compare('mitra',$this->mitra,true);
		}
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('status_bayar',$this->status_bayar,true);
		$criteria->compare('bukti_bayar',$this->bukti_bayar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchBootcamp()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->compare('id',$this->id,true);
		$mitra = Mitra::model()->findByAttributes(array('username'=>Yii::app()->user->id));
		if(!empty($mitra)){
			$criteria->compare('mitra',$mitra->id);
		}else{
			$criteria->compare('mitra',$this->mitra,true);
		}
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('type','BOOTCAMP');
		$criteria->compare('status_bayar',$this->status_bayar,true);
		$criteria->compare('bukti_bayar',$this->bukti_bayar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function searchAudit()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->compare('id',$this->id,true);
		$mitra = Mitra::model()->findByAttributes(array('username'=>Yii::app()->user->id));
		if(!empty($mitra)){
			$criteria->compare('mitra',$mitra->id);
		}else{
			$criteria->compare('mitra',$this->mitra,true);
		}
		$criteria->compare('updated',$this->updated,true);
		//$criteria->compare('type','AUDIT');
		$criteria->compare('status_bayar',$this->status_bayar,true);
		$criteria->compare('bukti_bayar',$this->bukti_bayar,true);
		$criteria->compare('parent',$this->parent,true);
		$criteria->condition = "type = 'AUDIT' OR type= 'PERBAIKAN'";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}