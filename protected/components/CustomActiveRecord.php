<?php
class CustomActiveRecord extends CActiveRecord {
    private static $wordnetdb = null;

    protected static function getWordnetDbConnection() {
        if(self::$wordnetdb!==null)
            return self::$wordnetdb;
        else {
            self::$wordnetdb=Yii::app()->dbwordnet;
            if (self::$wordnetdb instanceof CDbConnection) {
                self::$wordnetdb->setActive(true);
                return self::$wordnetdb;
            }
            else throw new CDbException (Yii::t('yii','Active record requires a DB connection.'));
        }
    }

}
?>
