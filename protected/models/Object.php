<?php

/**
 * This is the model class for table "object".
 *
 * The followings are the available columns in table 'object':
 * @property string $placeid
 * @property string $name
 * @property string $image
 */
class Object extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Object the static model class
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
		return 'object';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('placeid, name, image', 'required'),
			array('placeid', 'length', 'max'=>40),
			array('name', 'length', 'max'=>30),
			array('image', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('placeid, name, image', 'safe', 'on'=>'search'),
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
			'placeid' => 'Placeid',
			'name' => 'Name',
			'image' => 'Image',
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

		$criteria->compare('placeid',$this->placeid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}