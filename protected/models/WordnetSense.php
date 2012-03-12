<?php

/**
 * This is the model class for table "sense".
 *
 * The followings are the available columns in table 'sense':
 * @property string $wordno
 * @property string $synsetno
 * @property string $tagcnt
 */
class WordnetSense extends CustomActiveRecord {

    public function getDbConnection() {
        return self::getWordnetDbConnection();
    }

    /**
     * Returns the static model of the specified AR class.
     * @return WordnetSense the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sense';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('wordno, synsetno, tagcnt', 'required'),
            array('wordno, synsetno', 'length', 'max' => 6),
            array('tagcnt', 'length', 'max' => 5),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('wordno, synsetno, tagcnt', 'safe', 'on' => 'search'),
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
            'synsetno' => 'Synsetno',
            'tagcnt' => 'Tagcnt',
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
        $criteria->compare('synsetno', $this->synsetno, true);
        $criteria->compare('tagcnt', $this->tagcnt, true);
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getSynsetNo($wordno) {
        // returns the id number of the word from the word table
        // This allows for easy integration in to Yii widgest
        $criteria = new CDbCriteria();
        $criteria->select = 'synsetno';
        $criteria->condition = 'wordno=:wordnumber';
        $criteria->params = array(':wordnumber' => $wordno);
        $this->getDbCriteria()->mergeWith($criteria);
        return $this;
        //$vars = Type::model()->findAll($criteria);
    }

    public function primaryKey() {
        return array('wordno', 'synsetno');
    }

    public function getRawSynsetNo($wordno) {
        $synsetNo = array();
        $wordsQuery = Yii::app()->db->createCommand()
                ->selectDistinct('w.synsetno')->from('toponimo_wordnet.sense as w')
                ->where('w.wordno =:id', array(':id' => $wordno))
                ->queryAll();
  
        foreach($wordsQuery as $w){
            $synsetNo[] = $w[synsetno];
        }
        
        return $synsetNo;
    }

}