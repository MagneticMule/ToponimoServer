<?php

class AuthController extends Controller {

    public $defaultAction = 'login';
    private $id;
    private $username;
    private $password;
    private $status;
    private $user;

    public function login() {

        $this->user = YumUser::model()->find('upper(username) = :username', array(
            ':username' => strtoupper($this->username)));


        if ($this->user) {
            $this->user = $this->authenticate($this->user);
            return true;
        } else {
            Yum::log(Yum::t(
                            'Non-existent user {username} tried to log in (Ip-Address: {ip})', array(
                        '{ip}' => Yii::app()->request->getUserHostAddress(),
                        '{username}' => $this->username)), 'error');
        }

        return false;
    }

    public function authenticate($user) {
        $status = 0;
        $identity = new YumUserIdentity($this->username, $this->password);

        $identity->authenticate();
        switch ($identity->errorCode) {
            case YumUserIdentity::ERROR_NONE:
                $duration = 3600 * 24 * 30; // 30 days
                Yii::app()->user->login($identity, $duration);
                $this->status = 200;
                return $user;
                break;
            case YumUserIdentity::ERROR_EMAIL_INVALID:
                $this->status = 400;
                break;
            case YumUserIdentity::ERROR_STATUS_INACTIVE:
                $this->status = 400;
                break;
            case YumUserIdentity::ERROR_STATUS_BANNED:
                $this->status = 400;
                break;
            case YumUserIdentity::ERROR_STATUS_REMOVED:
                $this->status = 400;
                break;
            case YumUserIdentity::ERROR_PASSWORD_INVALID:
                $this->status = 401;
                Yum::log(Yum::t(
                                'Password invalid for user {username} (Ip-Address: {ip})', array(
                            '{ip}' => Yii::app()->request->getUserHostAddress(),
                            '{username}' => $this->username)), 'error');
                break;
                return false;
        }
    }

    public function actionLogin() {


        if (isset($_POST['UserLogin'])) {
            $this->username = $_POST['UserLogin']['username'];
            $this->password = $_POST['UserLogin']['password'];
            //$model->rememberMe = $_POST['rememberme'];
            if ($this->login()) {

                $userDetails = array(
                    "status" => $this->status,
                    "userId" => $this->user->id,
                    "firstName" => $this->user->profile->firstname,
                    "lastName" => $this->user->profile->lastname,
                );
                $this->sendResponse(200, (json_encode($userDetails)), "text/json");
            } else {
                $userDetails = array(
                    "status" => $this->status,
                    "userId" => "null",
                    "firstName" => "null",
                    "lastName" => "null",
                );
                $this->sendResponse(401, (json_encode($userDetails)), "text/json");
            }
        } else {
            $userDetails = array(
                "status" => $this->status,
                "userId" => "null",
                "firstName" => "null",
                "lastName" => "null",
            );
            $this->sendResponse(400, (json_encode($userDetails)), "text/json");
        }
    }

    private function sendResponse($status, $body = '', $contentType = 'text/json') {
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);
        header('Content-type: ' . $contentType);

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