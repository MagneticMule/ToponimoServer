<?php

/**
 * This is the model class for table "place".
 *
 * The followings are the available columns in table 'place':
 * @property integer $_id
 * @property string $name
 * @property double $latitude
 * @property double $longitude
 * @property string $type
 * @property string $vicinity
 * @property string $last_updated
 * @property string $placeid
 */
class Place extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Place the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'place';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, latitude, longitude, type, vicinity, placeid', 'required'),
            array('latitude, longitude', 'numerical'),
            array('name', 'length', 'max' => 80),
            array('type', 'length', 'max' => 20),
            array('vicinity', 'length', 'max' => 100),
            array('placeid', 'length', 'max' => 60),
            array('last_updated', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(' name, latitude, longitude, type, vicinity, last_updated, placeid', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'placetypes' => array(self::HAS_MANY, 'Type', 'placeid', 'together' => true),
            'words' => array(self::HAS_MANY, 'Word', 'placeid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            '_id' => 'ID',
            'name' => 'Name',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'type' => 'Type',
            'vicinity' => 'Vicinity',
            'last_updated' => 'Last Updated',
            'placeid' => 'Placeid',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('name', $this->name, true);
        $criteria->compare('latitude', $this->latitude);
        $criteria->compare('longitude', $this->longitude);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('vicinity', $this->vicinity, true);
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getRawPlaces($id) {
        $places = Yii::app()->db->createCommand()->
                selectDistinct('name, latitude, longitude, p.placeid, vicinity')
                ->from('place as p')->where('p.placeid = :id', array(':id'=>$id))
                ->queryAll();

        return $places;
    }

}