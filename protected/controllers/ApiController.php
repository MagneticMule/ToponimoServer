<?php

/**
 * API for Toponimo:
 * @category   Api
 * @package    Toponimo
 * @author     Original Author <skywriter@gmail.com>
 * @copyright  2011 Thomas Sweeney"
 * @version    0.1.1
 */
class ApiController extends Controller {

    /** get all models */
    public function actionList() {
        $results = array();
        // default to null
        $models = array();
        switch ($_GET['model']) {
            case 'contextualize':
                if (!isset($_GET['word']) || (!isset($_GET['placetypes']))) {
                    $this->_sendResponse(500, sprintf('Bad id name: %s', $_GET['word'] . " " . $_GET['placetypes']));
                }

                $score = array();
                //loop through each type and extract the word count score
                foreach ($_GET['placetypes'] as $type) {
                    $score[$type] = $this->lesk($_GET['word'], $type);
                }

                break;
            case 'words':
                if (!isset($_GET['pid'])) {
                    $this->_sendResponse(500, "No Id name");
                }

                $pid = $_GET['pid'];

                // add keys/values from the user word table
                $userWords = Word::model()->getRawWords($pid);
                $words['userwords'] = $userWords;

                // get place types
                // instantiate the Placetype & WordEnglish models
                $typeModel = Type::model();
                $wordEnglishModel = Wordenglish::model();
                $placeTypeModel = Placetype::model();

                $dictionary = array();
                $types = $typeModel->getArrayPlaceTypes($pid);
                foreach ($types as $type) {

                    // get the ID number of the of the current place type
                    $placeTypeId = $placeTypeModel->getTypeNumber($type);

                    // get list of words based on the current location ID
                    $dictionaryWords = $wordEnglishModel->getRawDictionaryWords($placeTypeId);

                    // assign word array to the dictionary array using the place type as a key
                    $dictionary = array_merge($dictionary, $dictionaryWords);
                }
                // add list of predefined words to the array
                $words['dictionarywords'] = $dictionary;
                $results = array_merge($words, $results);
                $models = $results;
                break;

            case 'images':
                if (!isset($_GET['word'])) {
                    $this->_sendResponse(500, sprintf('Bad word name'));
                }
                $images = Yii::app()->db->createCommand()
                        ->select('i.name, i.filepath, i.placeid, i.word, i.wordid, i.ownerid')
                        ->from('image as i')
                        ->where('i.word like :word', array(':word' => $_GET['word']))
                        ->queryAll();
                $result = array();
                foreach ($images as $i) {
                    $result[] = $i;
                }

                $models['image'] = $result;

                break;

            case 'define':
                if (!isset($_GET['word'])) {
                    $this->_sendResponse(500, sprintf('Bad word name'));
                }

                if (!isset($_GET['dict'])) {
                    $this->_sendResponse(500, sprintf('Bad dictionary type'));
                }

                //Yii::import('ext.stemmer.PorterStemmer', true);

                //$stem = PorterStemmer::Stem($_GET['word']);
                $word = $_GET['word'];

                if ($_GET['dict'] == 'wordnet') {

                    $wordno = WordnetWord::model()->getRawWordNumber($word);
                    $synsetno = array();
                    $synsetno = WordnetSense::model()->getRawSynsetNo($wordno);
                    $result = array();

                    foreach ($synsetno as $s) {
                        $result[] = WordnetSynset::model()->getRawDefinition($s);
                    }

                    $models['synset'] = array_reverse($result);

                    function cmp($a, $b) {
                        if ($a['lexno'] == $b['lexno'])
                            return 0;
                        return ($a['lexno'] < $b['lexno']) ? -1 : 1;
                    }

                    // usort($models, cmp);

                    $atonymQuery = Yii::app()->db->createCommand()
                            ->select('w.lemma')->from('toponimo_wordnet.word as w')
                            ->join('toponimo_wordnet.sense sense', 'sense.wordno = w.wordno')
                            ->join('toponimo_wordnet.synset syn', 'syn.synsetno = sense.synsetno')
                            ->join('toponimo_wordnet.semrel semrel', 'semrel.synsetno1 = syn.synsetno')
                            ->where('w.lemma =:id', array(':id' => $word))
                            ->queryAll();

                    $models['total'] = sizeof($models['synset']);



                    break;
                }

                $result = null;

                if ($_GET['dict'] == 'webster') { // use the merrium webster dictionary 
                    
                    
                    
                    $headWord = $this->getHeadword($word);
                    
                    
                    foreach ($headWord as $w) {
                        $w['definitions'] = Yii::app()->db->createCommand()
                                ->select('d.definition')
                                ->from('learner_definitions as d')
                                ->where('d.word_id =:id', array(':id' => $w['_id']))
                                ->queryAll();
                        $result[] = $w;
                    }




                    $models = array('words' => $result);

                    $result == null ? $models['total_words'] = 0 : $models['total_words'] = (sizeof($models['words']));
                }


                break;
            case 'places':

                // get list of places and associated data
                $models = Yii::app()->db->createCommand()->
                        selectDistinct('name, latitude, longitude, p.placeid, vicinity')
                        ->from('place as p')
                        ->queryAll();

                // construct the results array which will include the place name, type, id, types, 
                // user contributed words and dictionary (pre-defined) words.
                foreach ($models as $model) {

                    // add keys/values from the place table
                    $place['name'] = $model['name'];
                    $place['latitude'] = $model['latitude'];
                    $place['longitude'] = $model['longitude'];
                    $place['placeid'] = $model['placeid'];
                    $place['vicinity'] = $model['vicinity'];

                    // add keys/values from the types table
                    $typeModel = Type::model();
                    $types = $typeModel->getArrayPlaceTypes($model['placeid']);
                    $place['type'] = $types;


                    // instantiate the Placetype & WordEnglish models
                    $placeTypeModel = Placetype::model();
                    // $wordEnglishModel = Wordenglish::model();


                    $dictionary = array();
                    foreach ($types as $type) {

                        // get the ID number of the of the current place type
                        $placeTypeId = $placeTypeModel->getTypeNumber($type);

                        // get list of words based on the current location ID
                        $dictionaryWords = $wordEnglishModel->getArrayDictionaryWords($placeTypeId);

                        // assign word array to the dictionary array using the place type as a key
                        $dictionary[$type] = $dictionaryWords;
                    }
                    // add list of predefined words to the array
                    $place['dictionaryword'] = $dictionary;
                    $results[] = $place;
                    $models = $results;
                }
                break;
            default:
                $this->_sendResponse(
                        501, sprintf(
                                'Bad view name: %s', $_GET['model']
                        )
                );
                exit;
        }

        if (!is_null($models)) {

            // WTF is this code?
            //$rows = array();
            //foreach ($models as $model) {
            //    $rows[] = $model->attributes;
            //}
            $this->_sendResponse(200, CJSON::encode($models), 'application/json');
        } else {
            $this->_sendResponse(501, sprintf('Bad model name.'));
        }
    }

    /* get single model */

    public function actionView() {
        if (!isset($_GET['id'])) {
            $this->_sendResponse(500, sprintf('Bad id name: %s', $_GET['id']));
        }

        switch ($_GET['model']) {
            case 'word':
                $model = Word::model()->findByPk($_GET['id']);
                break;
            case 'place':
                $model = Place::model()->findByPk($_GET['id']);
                break;
            case 'image':
                $model = Image::model()->findByPk($_GET['id']);
                break;
            default:
                $this->_sendResponse(501, sprintf('Bad view name for model %s', $_GET['model']));
                exit;
        }

        if (!is_null($model)) {
            $this->_sendResponse(200, CJSON::encode($model), 'application/json');
        } else {
            $this->_sendResponse(404, 'No Item found');
        }
    }

    /* create new model */

    public function actionCreate() {
        switch ($_GET['model']) {
            case 'words':
                $model = new Word;
                break;
            case 'images':

                // if the 'postobject' variable isn't set get out of here
                if (!isset($_POST['postobject'])) {
                    $this->_sendResponse(400, 'Error "postobject" not found in POST body');
                } //else  
                // grab the size if a valid image else returns 0
                $usrImageSize = getimagesize($_FILES['userimage']);
                // if we dont have a valid image then get out of here
                if (!$usrImageSize) {
                    $this->_sendResponse(400, 'Error "postobject" is not a valid image');
                }
                // else, lets go ahead and grab the details of the image
                // the image section of the query
                $usrImage = $_FILES['userimage'];

                // user id
                $ownerId = $_POST['postobject']['ownerid'];

                // place id
                $usrPlaceId = $_POST['postobject']['placeid'];

                // word string
                $usrWord = $_POST['postobject']['word'];

                // word id
                $usrWordId = $_POST['postobject']['wordid'];

                // word id
                $usrWordNo = $_POST['postobject']['wordno'];

                // sense no
                // $usrWordSynsetNo = $_POST['postobject']['synsetno'];
                // where the image was uploaded
                $usrImageTemp = $_FILES['userimage']['tmp_name'];

                // the original image filename
                $usrImageName = $_FILES['userimage']['name'];

                // the mime type of the image
                $usrImageMime = $_FILES['userimage']['type'];

                // stores any error codes
                $usrImageError = $_FILES['userimage']['error'];

                // literal image save path
                $imageSavePath = '/home7/toponimo/www/wordimagestore/';

                // www based save access path
                $webPath = 'www.toponimo.org/wordimagestore/';
                if (!empty($usrImage)) {
                    if ($usrImageError > 0) {
                        switch ($usrImageError) {
                            case 1: $this->_sendResponse(404, 'File exceeded upload max file size.');
                            case 2: $this->_sendResponse(404, 'File exceeded max file size.');
                            case 3: $this->_sendResponse(400, 'File only partially uploaded.');
                            case 4: $this->_sendResponse(404, 'No file to upload.');
                                break;
                        }
                        exit;
                    }
                }

                if (!file_exists($imageSavePath . $usrWordId)) {
                    mkdir($imageSavePath . $usrWordId);
                }

                $imageName = md5(uniqid($usrWordId . $ownerId), false) . '.jpg';

                $uploadedImage = $imageSavePath
                        . $usrWordId
                        . '/'
                        . $imageName;

                // check if the file was successfuly uploaded
                if (is_uploaded_file($usrImageTemp)) {
                    if (!move_uploaded_file($usrImageTemp, $uploadedImage)) {
                        $this->_sendResponse(501, sprintf('Could not move file %s to target location', $uploadedImage));
                        exit;
                    } else { //success
                        $_POST['postobject']['filepath'] = $webPath . $usrWordId . '/';
                        $_POST['postobject']['name'] = $imageName;
                        // create thumbnails
                        $imageTemp = imagecreatefromjpeg($uploadedImage);

                        $model = new Image;
                        //$this->_sendResponse(200, $imageName);
                    }
                } else {
                    $this->_sendResponse(401, sprintf('Possible upload file attack: %s', $usrImageName));
                    exit;
                }
                break;

            default:
                $this->_sendResponse(501, sprintf('Action "create" not implemented for %s', $_GET['model']));
                exit;
        }


        if (isset($_POST['postobject'])) {
            // if value exists in model
            foreach ($_POST['postobject'] as $key => $val) {
                if ($model->hasAttribute($key)) {
                    $model->$key = $val;
                } else {
                    $this->_sendResponse(500, sprintf('Value %s:%s does not exist in %s', $key, $val, $_GET['model']));
                }
            }
        }


        if ($model->save()) { //success
            $this->_sendResponse(200, 'Successfuly added');
        } else { //prepare error message
            $errorMessage = sprintf('Unable to create model %s', $_GET['model']);
            $errorMessage .= "<ul>";
            foreach ($model->errors as $attribute => $attributeErrors) {
                $errorMessage .= "<li>$attribute</li>";
                $errorMessage .= "<ul>";

                foreach ($attributeErrors as $attributeError) {
                    $errorMessage .= "<li>$attributeError</li>";
                }
                $errorMessage .= "</ul>";
            }
            $errorMessage .="</ul>";
            $this->_sendResponse(500, $errorMessage);
        }
    }

    public function actionUpdate() {
        parse_str(file_get_contents('php://input'), $put_vars);

        switch ($_GET['model']) {
            case 'words':
                $model = Word::model()->findByPk($_GET['id']);
                break;
            default:
                $this->_sendResponse(501, sprintf('Update is not implemented for model %s', $_GET['model']));
                exit;
        }

        if (is_null($model)) {
            $this->_sendReponse(400, sprintf('Model %s not implemented for id %s', $_GET['model'], $_GET['id']));
        }

        /* Assign PUT parameters to attributes */
        foreach ($put_vars as $key => $val) {
            if ($model->hasAttribute($key)) {
                $model->$key = $val;
            } else {
                $this->_sendResponse(500, sprintf('%s is not allowed for model %s', $var, $_GET['model']));
            }
        }
        if ($model->save()) { //success
            $this->_sendResponse(200, sprintf('%s in model %s has been updated', $_GET['id'], $_GET['model']));
        } else { //prepare error message
            $errorMessage = sprintf('Unable to update model %s', $_GET['model']);
            $errorMessage .= "<ul>";
            foreach ($model->errors as $attribute => $attributeErrors) {
                $errorMessage .= "<li>$attribute</li>";
                $errorMessage .= "<ul>";

                foreach ($attributeErrors as $attributeError) {
                    $errorMessage .= "<li>$attributeError</li>";
                }
                $errorMessage .= "</ul>";
            }
            $errorMessage .="</ul>";
            $this->_sendResponse(500, $errorMessage);
        }
    }

    public function actionDelete() {
        switch ($_GET['model']) {
            case 'words':
                $model = Word::model()->findByPk($_GET['id']);
                break;
            default:
                $this->_sendResponse(501, sprintf('Action delete is not implemented for model %s'), $_GET['model']);
                exit;
        }

        if (is_null($model)) {
            $this->_sendResponse(400, sprintf('No model %s with id %s', $_GET['model'], $_GET['id']));
        }
        $message = $model->delete();
        if ($message > 0) { //model has been deleted
            $this->_sendResponse(200, sprintf('Model %s with id %s has been deleted', $_GET['model'], $_GET['id']));
        } else { //fail 
            $this->_sendResponse(500, sprintf('Cannot delete model %s with id %s', $_GET['model'], $_GET['id']));
        }
    }

    public function actionLogin() {
        $model = new UserLogin;

        if (isset($_POST['UserLogin'])) {
            $model->attributes = $_POST['UserLogin'];
            if ($model->validate()) {
                echo "user exists";
            } else {
                echo $model->getErrors();
            }
        } else {
            echo "Null post data";
        }
    }

    private function _checkAuth() {
        $user = Yii::app()->getModule('user')->$id;
    }

    private function _sendResponse($status = 200, $body = '', $contentType = 'application/json') {
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);
        header('Content-type: ' . $contentType);

        if ($body != '') {
            echo $body;
            exit;
        }
    }

    private function _getStatusCodeMessage($status) {
        $codes = Array(
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }

    private function _lesk($word, $placetype) {

        /*
         *  Stopwords from http://www.d.umn.edu/~tpederse/Group01/WordNet/wordnet-stoplist.html
         */


        $bestDefinition = 0;

        $wordno = WordnetWord::model()->getRawWordNumber($word);
        $synsetno = array();
        $synsetno = WordnetSense::model()->getRawSynsetNo($wordno);
        $definitions = array();

        foreach ($synsetno as $s) {
            $defintions['synset'][] = WordnetSynset::model()->getRawDefinition($s);
        }

        $cleanedDefinitions = str_replace($stopWords, "", $definitions['synset']);
    }

    public function getHeadword($word) {
        $headWord = Yii::app()->db->createCommand()
                ->select('m._id, m.lemma, m.syllables, m.pronounciation, m.part_of_speach, m.inflected_forms')
                ->from('learner_words as m')
                ->where('m.lemma like :id', array(':id' => $word))
                ->queryAll();
        
        return $headWord;
    }

}

?>
