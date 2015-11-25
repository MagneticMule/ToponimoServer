<?php

/**
 * This is the model class for table "word".
 *
 * The followings are the available columns in table 'word':
 * @property string $placeid
 * @property string $word
 * @property integer $_id
 * @property integer $userid
 */
class Word extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Word the static model class
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
            array('placeid, word, userid', 'required'),
            array('userid', 'numerical', 'integerOnly' => true),
            array('placeid', 'length', 'max' => 60),
            array('word', 'length', 'max' => 30),
            array('word, userid', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
// NOTE: you may need to adjust the relation name and the related
// class name for the relations automatically generated below.
        return array(
            'places' => array(self::BELONGS_TO, 'Place', 'placeid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'placeid' => 'Placeid',
            'word' => 'Word',
            '_id' => 'ID',
            'userid' => 'Userid',
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
        $criteria->compare('word', $this->word, true);
        $criteria->compare('_id', $this->_id);
        $criteria->compare('userid', $this->userid);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getWords($pid) {
// returns place types contained in a DBCriteria object.
// This allows for easy integration in to Yii widgest
        $criteria = new CDbCriteria();
        $criteria->select = 'word';
        $criteria->condition = 'placeid=:pid';
        $criteria->params = array(':pid' => $pid);
        $this->getDbCriteria()->mergeWith($criteria);
        return $this;
//$vars = Type::model()->findAll($criteria);
    }

    public function getRawWords($pid) {
        $wordsQuery = Yii::app()->db->createCommand()
                ->selectDistinct('w.word,w._id, w.userid')->from('word as w')
                ->where('w.placeid =:id', array(':id' => $pid))
                ->queryAll();
        return $wordsQuery;
    }

    public function getArrayWords($pid) {
        $results = array();
        $words = $this->getRawWords($pid);
        foreach ($words as $word) {
            $results[] = $word[word];
        }
        return $results;
    }

}