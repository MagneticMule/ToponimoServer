<?php

/**
 * This is the model class for table "type".
 *
 * The followings are the available columns in table 'type':
 * @property string $placeid
 * @property string $type
 * @property integer $_id
 */
class Type extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Type the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'type';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('placeid, type', 'required'),
            array('placeid', 'length', 'max' => 60),
            array('type', 'length', 'max' => 30),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('placeid, type, _id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the relatedo
        // class name for the relations automatically generated below.
        return array(
            'type' => array(self::BELONGS_TO, 'Place', 'placeid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'placeid' => 'Placeid',
            'type' => 'Type',
            '_id' => 'ID',
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
        $criteria->compare('placeid', $this->placeid, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('_id', $this->_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /*
     * returns place types contained in a DBCriteria object.
     * This allows for easy integration in to Yii widgest
     */
    public function getPlaceTypes($pid) {
        $criteria = new CDbCriteria();
        $criteria->select = 'type';
        $criteria->condition = 'placeid=:pid';
        $criteria->params = array(':pid' => $pid);
        $this->getDbCriteria()->mergeWith($criteria);
        return $this;
        
    }

    /*
     * returns place types table as a raw string array.
     */
    public function getRawPlaceTypes($pid) {
        $types = Yii::app()->db->createCommand()
                ->selectDistinct('t.type, t.placeid')
                ->from('type as t')
                ->where('t.placeid=:id', array(':id' => $pid))
                ->queryAll();
        return $types;
    }
    
    /*
     * Returns only the types column from the type table as an array
     */
    public function getArrayPlaceTypes($pid) {
       $results = array();
       $types = $this->getRawPlaceTypes($pid);
       foreach($types as $type){
           $results[] = $type[type];
       }
       
       return $results;
    }

}