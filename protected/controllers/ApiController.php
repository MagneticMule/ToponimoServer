<?php

class ApiController extends Controller {
    /* get all models */

    public function actionList() {
        $results = array();
        switch ($_GET['model']) {
            case 'contextualize':
                if (!isset($_GET['word']) || (!isset($_GET['placetypes']))) {
                    $this->sendResponse(500, sprintf('Bad id name: %s', $_GET['word'] . " " . $_GET['placetypes']));
                }
                
                $score = array();
                //loop through each type and extract the word count score
                foreach ($_GET['placetypes'] as $type) {
                    $score[$type] = $this->lesk($_GET['word'], $type);
                }
                
                break;
            case 'words':
                if (!isset($_GET['pid'])) {
                    $this->sendResponse(500, sprintf('Bad id name: %s', $_GET['pid']));
                }

                $pid = $_GET['pid'];

                // add keys/values from the user word table
                $wordModel = Word::model();
                $userWords = $wordModel->getRawWords($pid);
                $words[userwords] = $userWords;

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
                $words[dictionarywords] = $dictionary;
                $results = array_merge($words, $results);
                $models = $results;
                break;

            case 'images':
                $models = Image::model()->findAll();
                break;

            case 'wordnetwords':
                if (!isset($_GET['word'])) {
                    $this->sendResponse(500, sprintf('Bad word name: %s', $_GET['word']));
                }

                $word = $_GET['word'];
                $wordno = WordnetWord::model()->getRawWordNumber($word);
                $synsetno = array();
                $synsetno = WordnetSense::model()->getRawSynsetNo($wordno);
                $models = array();

                foreach ($synsetno as $s) {
                    $models[synset][] = WordnetSynset::model()->getRawDefinition($s);
                }


                $models[total] = sizeof($models[synset]);
                break;

            case 'places':
                // get list of places and associated data
                $models = Yii::app()->db->createCommand()->
                        selectDistinct('name, latitude, longitude, p.placeid, vicinity')
                        ->from('place as p')
                        ->queryAll();

                // construct the results array which will include the place name, type, id, types, 
                // user contributded words and dictionary (pre-defined) words.
                foreach ($models as $model) {

                    // add keys/values from the place table
                    $place[name] = $model[name];
                    $place[latitude] = $model[latitude];
                    $place[longitude] = $model[longitude];
                    $place[placeid] = $model[placeid];
                    $place[vicinity] = $model[vicinity];

                    // add keys/values from the types table
                    $typeModel = Type::model();
                    $types = $typeModel->getArrayPlaceTypes($model[placeid]);
                    $place[type] = $types;


                    // instantiate the Placetype & WordEnglish models
                    $placeTypeModel = Placetype::model();
                    $wordEnglishModel = Wordenglish::model();


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
                    $place[dictionaryword] = $dictionary;
                    $results[] = $place;
                    $models = $results;
                }
                break;
            default:
                $this->sendResponse(501, sprintf(
                                'Bad view name: %s', $_GET['model']));
                exit;
        }

        if (!is_null($models)) {
            $rows = array();
            foreach ($models as $model) {
                $rows[] = $model->attributes;
            }
            $this->sendResponse(200, CJSON::encode($models), 'application/json');
        } else {
            $this->sendResponse(501, sprintf('Bad model name: %s', $_GET['model']));
        }
    }

    /* get single model */

    public function actionView() {
        if (!isset($_GET['id'])) {
            $this->sendResponse(500, sprintf('Bad id name: %s', $_GET['id']));
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
                $this->sendResponse(501, sprintf('Bad view name for model %s', $_GET['model']));
                exit;
        }

        if (is_null($model)) {
            $this->sendResponse(404, 'No Item found with id ' . $_GET['id']);
        } else {
            $this->sendResponse(200, CJSON::encode($model), 'application/json');
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
                    $this->sendResponse(400, 'Error "postobject" not found in POST body');
                } //else           
                // the image section of the query
                $usrImage = $_FILES['userimage'];

                // user id
                $ownerId = $_POST['postobject']['ownerid'];

                // place id
                $usrPlaceId = $_POST['postobject']['placeid'];

                // word string
                $usrWord = $_POST['postobject']['word'];

                // word id
                $usrWordNo = $_POST['postobject']['wordno'];

                // sense no
                $usrWordSynsetNo = $_POST['postobject']['synsetno'];

                // where the image was uploaded
                $usrImageTemp = $_FILES['userimage']['tmp_name'];

                // the original image filename
                $usrImageName = $_FILES['userimage']['name'];

                // the size of the image
                $usrImageSize = $_FILES['userimage']['size'];

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
                            case 1: $this->sendResponse(404, 'File exceeded upload max file size.');
                            case 2: $this->sendResponse(404, 'File exceeded max file size.');
                            case 3: $this->sendResponse(400, 'File only partially uploaded.');
                            case 4: $this->sendResponse(404, 'No file to upload.');
                                break;
                        }
                        exit;
                    }
                }


                if (!file_exists($imageSavePath . $usrPlaceId)) {
                    mkdir($imageSavePath . $usrPlaceId);
                }

                $imageName = md5(uniqid($usrPlaceId . $ownerId), false) . '.jpg';

                $uploadedImage = $imageSavePath
                        . $usrPlaceId
                        . '/'
                        . $imageName;

                // check if the file was successfuly uploaded
                if (is_uploaded_file($usrImageTemp)) {
                    if (!move_uploaded_file($usrImageTemp, $uploadedImage)) {
                        $this->sendResponse(501, sprintf('Could not move file %s to target location', $uploadedImage));
                        exit;
                    } else { //success
                        $_POST['postobject']['filepath'] = $webPath . $usrPlaceId;
                        $_POST['postobject']['name'] = $imageName;
                        $model = new Image;
                    }
                } else {
                    $this->sendResponse(401, sprintf('Possible upload file attack: %s', $usrImageName));
                    exit;
                }
                break;

            default:
                $this->sendResponse(501, sprintf('Action "create" not implemented for %s', $_GET['model']));
                exit;
        }


        if (isset($_POST['postobject'])) {
            // if value exists in model
            foreach ($_POST['postobject'] as $key => $val) {
                if ($model->hasAttribute($key)) {
                    $model->$key = $val;
                } else {
                    $this->sendResponse(500, sprintf('Value %s:%s does not exist in %s', $key, $val, $_GET['model']));
                }
            }
        }


        if ($model->save()) { //success
            $this->sendResponse(200, 'Successfuly added');
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
            $this->sendResponse(500, $errorMessage);
        }
    }

    public function actionUpdate() {
        parse_str(file_get_contents('php://input'), $put_vars);

        switch ($_GET['model']) {
            case 'words':
                $model = Word::model()->findByPk($_GET['id']);
                break;
            default:
                $this->sendResponse(501, sprintf('Update is not implemented for model %s', $_GET['model']));
                exit;
        }

        if (is_null($model)) {
            $this->sendReponse(400, sprintf('Model %s not implemented for id %s', $_GET['model'], $_GET['id']));
        }

        /* Assign PUT parameters to attributes */
        foreach ($put_vars as $key => $val) {
            if ($model->hasAttribute($key)) {
                $model->$key = $val;
            } else {
                $this->sendResponse(500, sprintf('%s is not allowed for model %s', $var, $_GET['model']));
            }
        }
        if ($model->save()) { //success
            $this->sendResponse(200, sprintf('%s in model %s has been updated', $_GET['id'], $_GET['model']));
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
            $this->sendResponse(500, $errorMessage);
        }
    }

    public function actionDelete() {
        switch ($_GET['model']) {
            case 'words':
                $model = Word::model()->findByPk($_GET['id']);
                break;
            default:
                $this->sendResponse(501, sprintf('Action delete is not implemented for model %s'), $_GET['model']);
                exit;
        }

        if (is_null($model)) {
            $this->sendResponse(400, sprintf('No model %s with id %s', $_GET['model'], $_GET['id']));
        }
        $message = $model->delete();
        if ($message > 0) { //model has been deleted
            $this->sendResponse(200, sprintf('Model %s with id %s has been deleted', $_GET['model'], $_GET['id']));
        } else { //fail 
            $this->sendResponse(500, sprintf('Cannot delete model %s with id %s', $_GET['model'], $_GET['id']));
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

    private function checkAuth() {
        $user = Yii::app()->getModule('user')->$id;
    }

    private function sendResponse($status = 200, $body = '', $contentType = 'application/json') {
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);
        header('Content-type: ' . $content_type);

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

    private function lesk($word, $placetype) {

        /*
         *  Stopwords from http://www.d.umn.edu/~tpederse/Group01/WordNet/wordnet-stoplist.html
         */
        $stopWords = array(
            "I",
            "a",
            "an",
            "as",
            "at",
            "by",
            "he",
            "his",
            "me",
            "or",
            "thou",
            "us",
            "who",
            "against",
            "amid",
            "amidst",
            "among",
            "amongst",
            "and",
            "anybody",
            "anyone",
            "because",
            "beside",
            "circa",
            "despite",
            "during",
            "everybody",
            "everyone",
            "for",
            "from",
            "her",
            "hers",
            "herself",
            "him",
            "himself",
            "hisself",
            "idem",
            "if",
            "into",
            "it",
            "its",
            "itself",
            "myself",
            "nor",
            "of",
            "oneself",
            "onto",
            "our",
            "ourself",
            "ourselves",
            "per",
            "she",
            "since",
            "than",
            "that",
            "the",
            "thee",
            "theirs",
            "them",
            "themselves",
            "they",
            "thine",
            "this",
            "thyself",
            "to",
            "tother",
            "toward",
            "towards",
            "unless",
            "until",
            "upon",
            "versus",
            "via",
            "we",
            "what",
            "whatall",
            "whereas",
            "which",
            "whichever",
            "whichsoever",
            "whoever",
            "whom",
            "whomever",
            "whomso",
            "whomsoever",
            "whose",
            "whosoever",
            "with",
            "without",
            "ye",
            "you",
            "you-all",
            "yours",
            "yourself",
            "yourselves",
            "aboard",
            "about",
            "above",
            "across",
            "after",
            "all",
            "along",
            "alongside",
            "although",
            "another",
            "anti",
            "any",
            "anything",
            "around",
            "astride",
            "aught",
            "bar",
            "barring",
            "before",
            "behind",
            "below",
            "beneath",
            "besides",
            "between",
            "beyond",
            "both",
            "but",
            "concerning",
            "considering",
            "down",
            "each",
            "either",
            "enough",
            "except",
            "excepting",
            "excluding",
            "few",
            "fewer",
            "following",
            "ilk",
            "in",
            "including",
            "inside",
            "like",
            "many",
            "mine",
            "minus",
            "more",
            "most",
            "naught",
            "near",
            "neither",
            "nobody",
            "none",
            "nothing",
            "notwithstanding",
            "off",
            "on",
            "opposite",
            "other",
            "otherwise",
            "outside",
            "over",
            "own",
            "past",
            "pending",
            "plus",
            "regarding",
            "round",
            "save",
            "self",
            "several",
            "so",
            "some",
            "somebody",
            "someone",
            "something",
            "somewhat",
            "such",
            "suchlike",
            "sundry",
            "there",
            "though",
            "through",
            "throughout",
            "till",
            "twain",
            "under",
            "underneath",
            "unlike",
            "up",
            "various",
            "vis-a-vis",
            "whatever",
            "whatsoever",
            "when",
            "wherewith",
            "wherewithal",
            "while",
            "within",
            "worth",
            "yet",
            "yon",
            "yonder");

        $bestDefinition = 0;

        $wordno = WordnetWord::model()->getRawWordNumber($word);
        $synsetno = array();
        $synsetno = WordnetSense::model()->getRawSynsetNo($wordno);
        $definitions = array();

        foreach ($synsetno as $s) {
            $defintions[synset][] = WordnetSynset::model()->getRawDefinition($s);
        }

        $cleanedDefinitions = str_replace($stopWords, "", $definitions[synset]);
        
        
    }

}

?>
