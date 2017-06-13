<?php

/**
 * This is the model class for table "bootcamp_dokumen".
 *
 * The followings are the available columns in table 'bootcamp_dokumen':
 * @property string $id
 * @property string $bootcamp
 * @property string $q_dokumen
 * @property string $answer
 * @property string $updated
 *
 * The followings are the available model relations:
 * @property Bootcamp $bootcamp0
 * @property QDokumen $qDokumen
 */
class BootcampDokumen extends CActiveRecord
{
	public $question;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BootcampDokumen the static model class
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
		return 'bootcamp_dokumen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bootcamp, q_dokumen, answer, updated', 'required'),
			array('bootcamp, q_dokumen, answer', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bootcamp, q_dokumen, answer, updated', 'safe', 'on'=>'search'),
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
			'bootcamp0' => array(self::BELONGS_TO, 'Bootcamp', 'bootcamp'),
			'qDokumen' => array(self::BELONGS_TO, 'QDokumen', 'q_dokumen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bootcamp' => 'Bootcamp',
			'q_dokumen' => 'Q Dokumen',
			'answer' => 'Answer',
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
		$criteria->compare('bootcamp',$this->bootcamp,true);
		$criteria->compare('q_dokumen',$this->q_dokumen,true);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}