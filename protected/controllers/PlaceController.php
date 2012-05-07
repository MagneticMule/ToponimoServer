<?php

class PlaceController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'updateAjaxMap', 'updateResults'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Place;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Place'])) {
            $model->attributes = $_POST['Place'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Place'])) {
            $model->attributes = $_POST['Place'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * List all models based on distance to location given in lat/lng or
     * list all models based on search query.
     * Defaults to list every model.
     */
    public function actionIndex() {
        $criteria = new CDbCriteria();
        if (isset($_GET['lat']) && isset($_GET['lng'])) {
            $criteria->select = '*, ( 6371 * acos( cos( radians(' . $_GET['lat'] . ') ) 
                * cos( radians( latitude ) ) * cos( radians( longitude ) - 
                radians(' . $_GET['lng'] . ') ) + sin( radians(' . $_GET['lat'] . ') ) 
                * sin( radians( latitude ) ) ) ) * 1.609344 AS distance';
            $criteria->order = 'distance asc'; 
        } elseif (isset($_GET['q'])) {
            $query = $_GET['q'];
            $criteria->compare('name', $query, true, 'OR', true);
            $criteria->compare('vicinity', $query, true, 'OR', true);
        }

        $criteria->limit = 20;
        $dataProvider = new CActiveDataProvider('Place', array('criteria' => $criteria));
        $dataProvider->setPagination(false);
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionUpdateResults($lat,$lng) {
     
        $model = Place::model();
        
        //$model->updateLocalPlaces($lat, $lng);

        $criteria = new CDbCriteria();

        $criteria->select = '*, ( 6371 * acos( cos( radians(' . $lat . ') ) 
                * cos( radians( latitude ) ) * cos( radians( longitude ) - 
                radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) 
                * sin( radians( latitude ) ) ) ) * 1.609344 AS distance';
        $criteria->order = 'distance asc';
        $criteria->limit = 20;
        $dataProvider = new CActiveDataProvider('Place', array('criteria' => $criteria));
        $dataProvider->setPagination(false);
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
        
        return $dataProvider;
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Place('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Place']))
            $model->attributes = $_GET['Place'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Place::model()->with('type')->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'place-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /*
      public function searchPlaceResults($lat, $lng, $range) {
      if (is_null($range)) {
      $range = 1;
      }
      $model = Place::model();
      $model->getLocalPlaces($lat, $lng);



      $haversineQuery ="SELECT place.latitude, place.longitude, place.vicinity, place.placeid, place.name, ( 6371 * acos( cos( radians('" . $lat
      . "') ) * cos( radians( place.latitude ) ) * cos( radians( place.longitude ) - radians('" . $lng . "') ) + sin( radians('"
      . $lat . "') ) * sin( radians( place.latitude ) ) ) ) AS distance FROM place HAVING distance <'" . $usr_range . "' ORDER BY distance LIMIT 0 , 30";

      $connection = Yii::app()->db;
      $command = $connection->createCommand($haversineQuery);
      $results = $command->queryAll();

      $dataProvider = new CSqlDataProvider($results, array(
      'pagination' => array('pageSize' => 10)
      ));

      return $dataProvider;
      }
     */
}

