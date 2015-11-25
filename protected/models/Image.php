<?php

/**
 * This is the model class for table "image".
 *
 * The followings are the available columns in table 'image':
 * @property string $name
 * @property string $filepath
 * @property string $placeid
 * @property string $word
 * @property string $wordid
 * @property integer $ownerid
 *
 * The followings are the available model relations:
 * @property TblUsers $owner
 * @property Place $place
 */
class Image extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Image the static model class
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
		return 'image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, filepath, placeid, word, wordid, ownerid', 'required'),
			array('ownerid', 'numerical', 'integerOnly'=>true),
			array('name, placeid', 'length', 'max'=>60),
			array('filepath, word', 'length', 'max'=>80),
			array('wordid', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('name, filepath, placeid, word, wordid, ownerid', 'safe', 'on'=>'search'),
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
			//'owner' => array(self::BELONGS_TO, 'TblUsers', 'ownerid'),
			//'place' => array(self::BELONGS_TO, 'Place', 'placeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'name' => 'Name',
			'filepath' => 'Filepath',
			'placeid' => 'Placeid',
			'word' => 'Word',
			'wordid' => 'Wordid',
			'ownerid' => 'Ownerid',
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

		$criteria->compare('name',$this->name,true);
		$criteria->compare('filepath',$this->filepath,true);
		$criteria->compare('placeid',$this->placeid,true);
		$criteria->compare('word',$this->word,true);
		$criteria->compare('wordid',$this->wordid,true);
		$criteria->compare('ownerid',$this->ownerid, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}