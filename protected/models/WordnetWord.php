<?php

/**
 * This is the model class for table "word".
 *
 * The followings are the available columns in table 'word':
 * @property string $wordno
 * @property string $lemma
 */
class WordnetWord extends CustomActiveRecord {

    public function getDbConnection() {
        return self::getWordnetDbConnection();
    }

    /**
     * Returns the static model of the specified AR class.
     * @return WordnetWord the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'word';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('wordno, lemma', 'required'),
            array('wordno', 'length', 'max' => 6),
            array('lemma', 'length', 'max' => 80),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('wordno, lemma', 'safe', 'on' => 'search'),
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
            'wordno' => 'Wordno',
            'lemma' => 'Lemma',
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

        $criteria->compare('wordno', $this->wordno, true);
        $criteria->compare('lemma', $this->lemma, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getWordNumber($word) {
        // returns the id number of the word from the word table
        // This allows for easy integration in to Yii widgest
        $criteria = new CDbCriteria();
        $criteria->select = 'wordno';
        $criteria->condition = 'lemma=:lem';
        $criteria->params = array(':lem' => $word);
        $this->getDbCriteria()->mergeWith($criteria);
        return $this;
        //$vars = Type::model()->findAll($criteria);
    }

    public function getRawWordNumber($word) {

        $wordsQuery = Yii::app()->db->createCommand()
                ->selectDistinct('w.wordno')->from('toponimo_wordnet.word as w')
                ->where('w.lemma =:id', array(':id' => $word))
                ->queryAll();

        foreach ($wordsQuery as $w) {
            $result = $w[wordno];
        }


        return $result;
    }

}