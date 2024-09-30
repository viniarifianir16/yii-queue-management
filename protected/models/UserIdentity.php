<?php
class UserIdentity extends CUserIdentity
{
    private $_id;

    public function authenticate()
    {
        $user = User::model()->findByAttributes(array('username' => $this->username));

        if ($user === null) {
            // User tidak ditemukan
            var_dump("User tidak ditemukan");
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif (!$user->validatePassword($this->password)) {
            // Password salah
            var_dump("Password salah");
            var_dump($user->password);
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            // Login berhasil
            var_dump("Login berhasil");
            $this->_id = $user->id;
            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}

?>