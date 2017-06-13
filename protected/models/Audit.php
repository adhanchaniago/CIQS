<?php

/**
 * This is the model class for table "audit".
 *
 * The followings are the available columns in table 'audit':
 * @property string $id
 * @property string $tgl_mulai
 * @property string $tgl_selesai
 * @property string $pengajuan
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Pengajuan $pengajuan0
 * @property AuditDokumen[] $auditDokumens
 * @property GroupAudit[] $groupAudits
 */
class Audit extends CActiveRecord
{
	public $groupAudit;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Audit the static model class
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
		return 'audit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tgl_mulai, tgl_selesai, pengajuan, updated', 'required'),
			array('pengajuan', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tgl_mulai, tgl_selesai, pengajuan, updated', 'safe', 'on'=>'search'),
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
			'auditDokumens' => array(self::HAS_MANY, 'AuditDokumen', 'audit'),
			'groupAudits' => array(self::HAS_MANY, 'GroupAudit', 'audit'),
			'countParty' => array(self::STAT, 'GroupAudit', 'audit'),
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
		$criteria->compare('tgl_mulai',$this->tgl_mulai,true);
		$criteria->compare('tgl_selesai',$this->tgl_selesai,true);
		$criteria->compare('pengajuan',$this->pengajuan,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}