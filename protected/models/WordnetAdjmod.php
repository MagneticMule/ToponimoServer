<?php

/**
 * This is the model class for table "adjmod".
 *
 * The followings are the available columns in table 'adjmod':
 * @property string $synsetno
 * @property string $wordno
 * @property string $modifier
 */
class WordnetAdjmod extends CustomActiveRecord {

    public function getDbConnection() {
        return self::getWordnetDbConnection();
    }

    /**
     * Returns the static model of the specified AR class.
     * @return WordnetAdjmod the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'adjmod';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('synsetno, wordno, modifier', 'required'),
            array('synsetno, wordno', 'length', 'max' => 6),
            array('modifier', 'length', 'max' => 2),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('synsetno, wordno, modifier', 'safe', 'on' => 'search'),
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
            'synsetno' => 'Synsetno',
            'wordno' => 'Wordno',
            'modifier' => 'Modifier',
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

        $criteria->compare('synsetno', $this->synsetno, true);
        $criteria->compare('wordno', $this->wordno, true);
        $criteria->compare('modifier', $this->modifier, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}