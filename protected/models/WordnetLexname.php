<?php

/**
 * This is the model class for table "lexname".
 *
 * The followings are the available columns in table 'lexname':
 * @property string $lexno
 * @property string $lexname
 * @property string $description
 */
class WordnetLexname extends CustomActiveRecord {

    public function getDbConnection() {
        return self::getWordnetDbConnection();
    }

    /**
     * Returns the static model of the specified AR class.
     * @return WordnetLexname the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'lexname';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('lexno', 'required'),
            array('lexno', 'length', 'max' => 2),
            array('lexname', 'length', 'max' => 30),
            array('description', 'length', 'max' => 80),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('lexno, lexname, description', 'safe', 'on' => 'search'),
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
            'lexno' => 'Lexno',
            'lexname' => 'Lexname',
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

        $criteria->compare('lexno', $this->lexno, true);
        $criteria->compare('lexname', $this->lexname, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
        public function getRawLexname($lexno) {

        $lexQuery = Yii::app()->db->createCommand()
                ->selectDistinct('l.lexname')->from('toponimo_wordnet.lexname as l')
                ->where('l.lexno =:id', array(':id' => $lexno))
                ->queryAll();
  
        foreach($lexQuery as $l){
            $lexName = $l[lexname];
        }
        
        return $lexName;
    }

}