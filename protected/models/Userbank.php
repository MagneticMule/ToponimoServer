<?php

/**
 * This is the model class for table "userbank".
 *
 * The followings are the available columns in table 'userbank':
 * @property string $username
 * @property string $lemma
 * @property string $wordno
 * @property double $lat
 * @property double $lng
 * @property string $placeid
 */
class Userbank extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Userbank the static model class
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
		return 'userbank';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, lemma, wordno, lat, lng, placeid', 'required'),
			array('lat, lng', 'numerical'),
			array('username', 'length', 'max'=>20),
			array('wordno', 'length', 'max'=>6),
			array('placeid', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, lemma, wordno, lat, lng, placeid', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'lemma' => 'Lemma',
			'wordno' => 'Wordno',
			'lat' => 'Lat',
			'lng' => 'Lng',
			'placeid' => 'Placeid',
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('lemma',$this->lemma,true);
		$criteria->compare('wordno',$this->wordno,true);
		$criteria->compare('lat',$this->lat);
		$criteria->compare('lng',$this->lng);
		$criteria->compare('placeid',$this->placeid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}