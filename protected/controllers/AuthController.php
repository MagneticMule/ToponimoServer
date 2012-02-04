<?php

class AuthController extends Controller {

    public $defaultAction = 'login';

    public function actionLogin() {
        $model = new UserLogin;
        if (isset($_POST['UserLogin'])) {
            $model->attributes = $_POST['UserLogin'];
           // $model->username = $_POST['username'];
           // $model->password = $_POST['password'];
           // $model->rememberMe = $_POST['rememberme'];

            if ($model->validate()) {
                $record = User::model()->findByAttributes(array('username' => "admin"));
                $userid = $record->id;
                $profile = TblProfiles::model()->findByAttributes(array('user_id' => $userid));
                $userDetails = array(
                	"status"=> 1,
                    "userId" => $userid,
                    "firstName" => $profile->firstname,
                    "lastName" => $profile->lastname,
                );

                $this->sendResponse(200, (json_encode($userDetails)), "text/html");
            } else {
                $this->sendResponse(401, sprintf(array("status"=>2)), "text/html");
            }
        } else {
            $this->sendResponse(400, sprintf(array("status"=>3)), "text/html");
        }
    }

    private function sendResponse($status = 200, $body = '', $contentType = 'text/html') {
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);
        header('Content-type: ' . $content_type);

        if ($body != '') {
            echo $body;
            exit;
        } else {
            
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

}
?>