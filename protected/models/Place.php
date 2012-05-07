<?php

/**
 * This is the model class for table "place".
 *
 * The followings are the available columns in table 'place':
 * @property integer $_id
 * @property string $name
 * @property double $latitude
 * @property double $longitude
 * @property string $type
 * @property string $vicinity
 * @property string $last_updated
 * @property string $placeid
 */
class Place extends CActiveRecord {

    public $latitude;
    public $longitude;

    /**
     * Returns the static model of the specified AR class.
     * @return Place the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'place';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, latitude, longitude, type, vicinity, placeid', 'required'),
            array('latitude, longitude', 'numerical'),
            array('name', 'length', 'max' => 80),
            //array('type', 'length', 'max' => 20),
            array('vicinity', 'length', 'max' => 100),
            array('placeid', 'length', 'max' => 60),
            array('last_updated', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(' name, latitude, longitude, vicinity, last_updated, placeid', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'type' => array(self::HAS_MANY, 'Type', 'placeid', 'together' => true),
            'words' => array(self::HAS_MANY, 'Word', 'placeid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            '_id' => 'ID',
            'name' => 'Name',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'type' => 'Type',
            'vicinity' => 'Vicinity',
            'last_updated' => 'Last Updated',
            'placeid' => 'Placeid',
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

        $criteria->compare('name', $this->name, true);
        $criteria->compare('latitude', $this->latitude);
        $criteria->compare('longitude', $this->longitude);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('vicinity', $this->vicinity, true);
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getRawPlaces($id) {
        $places = Yii::app()->db->createCommand()->
                selectDistinct('name, latitude, longitude, p.placeid, vicinity')
                ->from('place as p')->where('p.placeid = :id', array(':id' => $id))
                ->queryAll();

        return $places;
    }

    public function updateLocalPlaces($lat, $lng) {

        $range = '1'; //KM
        //for google request
        //Good practice suggests that RADIUS should be set depending on the accuracy on the devices returned location
        $g_radius = 'radius=1000'; //the radius containing the search results
        $g_sensor = 'sensor=true'; //always pass true for sensor value
        $g_key = 'AIzaSyARV2mbzLBlF697bCAa03UysnaF2FK2eec'; // our google api key
        $g_request = 'https://maps.googleapis.com/maps/api/place/search/json?location='; // the request body
        $request = $g_request . $lat . ',' . $lng . '&' . $g_radius . '&' . $g_sensor . '&key=' . $g_key; //the compiled request
        //read the contents of the page to a string
        $jsondata = file_get_contents($request);

        //parsed the string as to json format
        $json_formatted = (json_decode($jsondata, true));

        $places = array();

        //loop through string and extract values.
        foreach ($json_formatted[results] as $p) {

            $place['pName'] = $p['name'];
            $place['pVicinity'] = $p['vicinity'];
            $place['pTypes'] = $p['types'];
            $place['pLat'] = $p['geometry']['location']['lat'];
            $place['pLng'] = $p['geometry']['location']['lng'];
            $place['pGoogleID'] = $p['id'];

            $places[] = $place;
        }

        foreach ($places as $place) {
            $values = array();
            $values[] = "'" . $place['pName'] . "'";
            $values[] = $place['pLat'];
            $values[] = $place['pLng'];
            $values[] = "'" . $place['pVicinity'] . "'";
            $values[] = "'" . $place['pGoogleID'] . "'";

            if (!empty($values)) {
                $query = "INSERT INTO place (name, latitude, longitude, vicinity, placeid) VALUES ( " . implode(',', $values) . ")
                            ON DUPLICATE KEY UPDATE placeid = placeid"; //use instead of 'IGNORE' to capture other errors;
                $sqlresult = mysql_query($query);

                if (!empty($place['pTypes'])) {
                    foreach ($place['pTypes'] as $type) {
                        $query = "INSERT INTO type ( placeid, type ) VALUES ( '" . $place['pGoogleID'] . "', '" . $type . "')
                                     ON DUPLICATE KEY UPDATE placeid = placeid"; //use instead of 'IGNORE' to capture other errors
                        $sqlresult = mysql_query($query);
                    }
                }
            }
        }
    }

}