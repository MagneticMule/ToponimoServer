<?php

/**
 * This is the model class for table "synset".
 *
 * The followings are the available columns in table 'synset':
 * @property string $synsetno
 * @property string $definition
 * @property string $lexno
 */
class WordnetSynset extends CustomActiveRecord {

    public function getDbConnection() {
        return self::getWordnetDbConnection();
    }

    /**
     * Returns the static model of the specified AR class.
     * @return WordnetSynset the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'synset';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('synsetno, lexno', 'required'),
            array('synsetno', 'length', 'max' => 6),
            array('lexno', 'length', 'max' => 2),
            array('definition', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('synsetno, definition, lexno', 'safe', 'on' => 'search'),
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
            'definition' => 'Definition',
            'lexno' => 'Lexno',
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
        $criteria->compare('definition', $this->definition, true);
        $criteria->compare('lexno', $this->lexno, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getDefinition($synsetno) {
        // returns the id number of the word from the word table
        // This allows for easy integration in to Yii widgest
        $criteria = new CDbCriteria();
        $criteria->select = 'definition';
        $criteria->condition = 'synsetno=:syn';
        $criteria->params = array(':syn' => $synsetno);
        $this->getDbCriteria()->mergeWith($criteria);
        return $this;
        //$vars = Type::model()->findAll($criteria);
    }

    public function getRawDefinition($synsetNo) {
        $definitions = array();
        $definitionQuery = Yii::app()->db->createCommand()
                ->selectDistinct('s.definition, s.lexno')->from('toponimo_wordnet.synset as s')
                ->where('s.synsetno =:id', array(':id' => $synsetNo))
                ->order('s.lexno desc')
                ->queryAll();
        
         

        foreach ($definitionQuery as $d) {
            $sampleNo = 0;
            $definitions[definitions] = $d[definition];
            $definitions[lex] = WordnetLexname::model()->getRawLexname($d[lexno]);
            $definitions[synsetno] = $synsetNo;
            $definitions[sample] = WordnetSample::model()->getRawSample($synsetNo, $sampleNo);
            $definitions[lexno] = $d[lexno];
            $atonymNo = WordnetSemrel::model()->getRawSemRel($synsetNo);
            $sampleNo ++;
        }

        return $definitions;
    }

}