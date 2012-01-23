<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $_id
 * @property string $username
 * @property string $salt
 * @property string $first_name
 * @property string $middle_initial
 * @property string $last_name
 * @property string $d_o_b
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $region
 * @property string $country
 * @property string $email
 * @property integer $mob_phone
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, salt, first_name, middle_initial, last_name, d_o_b, address_1, address_2, city, region, country, email, mob_phone', 'required'),
			array('mob_phone', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>12),
			array('salt', 'length', 'max'=>8),
			array('first_name, middle_initial, last_name, address_1, address_2', 'length', 'max'=>45),
			array('city, region, email', 'length', 'max'=>40),
			array('country', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('_id, username, salt, first_name, middle_initial, last_name, d_o_b, address_1, address_2, city, region, country, email, mob_phone', 'safe', 'on'=>'search'),
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
			'_id' => 'ID',
			'username' => 'Username',
			'salt' => 'Salt',
			'first_name' => 'First Name',
			'middle_initial' => 'Middle Initial',
			'last_name' => 'Last Name',
			'd_o_b' => 'D O B',
			'address_1' => 'Address 1',
			'address_2' => 'Address 2',
			'city' => 'City',
			'region' => 'Region',
			'country' => 'Country',
			'email' => 'Email',
			'mob_phone' => 'Mob Phone',
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

		$criteria->compare('_id',$this->_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_initial',$this->middle_initial,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('d_o_b',$this->d_o_b,true);
		$criteria->compare('address_1',$this->address_1,true);
		$criteria->compare('address_2',$this->address_2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('mob_phone',$this->mob_phone);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}