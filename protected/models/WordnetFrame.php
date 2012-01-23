<?php

/**
 * This is the model class for table "frame".
 *
 * The followings are the available columns in table 'frame':
 * @property string $frameno
 * @property string $description
 */
class WordnetFrame extends CustomActiveRecord {

    public function getDbConnection() {
        return self::getWordnetDbConnection();
    }

    /**
     * Returns the static model of the specified AR class.
     * @return WordnetFrame the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'frame';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('frameno', 'required'),
            array('frameno', 'length', 'max' => 2),
            array('description', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('frameno, description', 'safe', 'on' => 'search'),
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
            'frameno' => 'Frameno',
            'description' => 'Description',
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

        $criteria->compare('frameno', $this->frameno, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}