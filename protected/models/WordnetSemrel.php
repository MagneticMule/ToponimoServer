<?php

/**
 * This is the model class for table "semrel".
 *
 * The followings are the available columns in table 'semrel':
 * @property string $synsetno1
 * @property string $synsetno2
 * @property string $reltypeno
 */
class WordnetSemrel extends CustomActiveRecord {

    public function getDbConnection() {
        return self::getWordnetDbConnection();
    }

    /**
     * Returns the static model of the specified AR class.
     * @return WordnetSemrel the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'semrel';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('synsetno1, synsetno2, reltypeno', 'required'),
            array('synsetno1, synsetno2', 'length', 'max' => 6),
            array('reltypeno', 'length', 'max' => 2),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('synsetno1, synsetno2, reltypeno', 'safe', 'on' => 'search'),
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
            'synsetno1' => 'Synsetno1',
            'synsetno2' => 'Synsetno2',
            'reltypeno' => 'Reltypeno',
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

        $criteria->compare('synsetno1', $this->synsetno1, true);
        $criteria->compare('synsetno2', $this->synsetno2, true);
        $criteria->compare('reltypeno', $this->reltypeno, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}