<?php

/**
 * This is the model class for table "placetype".
 *
 * The followings are the available columns in table 'placetype':
 * @property integer $_id
 * @property string $name
 */
class Placetype extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Placetype the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'placetype';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('name', 'length', 'max' => 30),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('_id, name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            '_id' => 'ID',
            'name' => 'Name',
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

        $criteria->compare('_id', $this->_id);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getTypeNumber($name) {
        $types = Yii::app()->db->createCommand()
                ->selectDistinct('p._id')->from('placetype as p')
                ->where('p.name =:name', array(':name' =>$name))
                ->queryAll();
        
        foreach($types as $type){
            $typeId = $type[_id];
        }
        return $typeId;
    }

}