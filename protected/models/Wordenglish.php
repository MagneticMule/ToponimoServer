<?php

/**
 * This is the model class for table "wordenglish".
 *
 * The followings are the available columns in table 'wordenglish':
 * @property integer $_id
 * @property string $wordid
 * @property string $word
 * @property integer $placetypeid
 */
class Wordenglish extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Wordenglish the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'wordenglish';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('wordid, word, placetypeid', 'required'),
            array('placetypeid', 'numerical', 'integerOnly' => true),
            array('wordid', 'length', 'max' => 6),
            array('word', 'length', 'max' => 80),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('_id, wordid, word, placetypeid', 'safe', 'on' => 'search'),
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
            'wordid' => 'Wordid',
            'word' => 'Word',
            'placetypeid' => 'Placetypeid',
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
        $criteria->compare('wordid', $this->wordid, true);
        $criteria->compare('word', $this->word, true);
        $criteria->compare('placetypeid', $this->placetypeid);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getRawDictionaryWords($id) {
        $wordsQuery = Yii::app()->db->createCommand()
                ->selectDistinct('w.word,w._id')->from('wordenglish as w')
                ->where('w.placetypeid =:id', array(':id' => $id))
                ->queryAll();
        return $wordsQuery;
    }
    
    public function getArrayDictionaryWords($id) {
        $result = array();
        $words = $this->getRawDictionaryWords($id);
        foreach($words as $word){
            $result[] = $word[word];
        }
        return $result;
    }

}