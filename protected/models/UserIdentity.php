<?php
class UserIdentity extends CUserIdentity
{
    private $_id;

    public function authenticate()
    {
        // Fetch user by username
        $user = User::model()->find('LOWER(username)=?', array(strtolower($this->username)));

        if ($user === null) {
            Yii::log("Username not found: {$this->username}", 'error');
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            if (!CPasswordHelper::verifyPassword($this->password, $user->password)) {
                Yii::log("Invalid password for user: {$this->username}", 'error');
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                Yii::log("Login successful for user: {$this->username}", 'info');
                $this->_id = $user->id;
                $this->setState('username', $user->username);
                $this->errorCode = self::ERROR_NONE;
            }
        }
        return !$this->errorCode;
    }


    public function getId()
    {
        return $this->_id;
    }
}
?>