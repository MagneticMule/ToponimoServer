<?php

/**
 * This is the model class for table "lexrel".
 *
 * The followings are the available columns in table 'lexrel':
 * @property string $wordno1
 * @property string $synsetno1
 * @property string $wordno2
 * @property string $synsetno2
 * @property string $reltypeno
 */
class WordnetLexrel extends CustomActiveRecord {

    public function getDbConnection() {
        return self::getWordnetDbConnection();
    }

    /**
     * Returns the static model of the specified AR class.
     * @return WordnetLexrel the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'lexrel';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('wordno1, synsetno1, wordno2, synsetno2, reltypeno', 'required'),
            array('wordno1, synsetno1, wordno2, synsetno2', 'length', 'max' => 6),
            array('reltypeno', 'length', 'max' => 2),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('wordno1, synsetno1, wordno2, synsetno2, reltypeno', 'safe', 'on' => 'search'),
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
            'wordno1' => 'Wordno1',
            'synsetno1' => 'Synsetno1',
            'wordno2' => 'Wordno2',
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

        $criteria->compare('wordno1', $this->wordno1, true);
        $criteria->compare('synsetno1', $this->synsetno1, true);
        $criteria->compare('wordno2', $this->wordno2, true);
        $criteria->compare('synsetno2', $this->synsetno2, true);
        $criteria->compare('reltypeno', $this->reltypeno, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}