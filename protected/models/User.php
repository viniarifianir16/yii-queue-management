<?php
class User extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return array(
            array('username, email, password', 'required'),
            array('email', 'email'),
            array('username', 'unique', 'message' => 'Username already exists.'),
            array('password', 'length', 'min' => 6, 'max' => 255),
        );
    }

    public function beforeSave()
    {
        if ($this->isNewRecord) {
            $this->password = CPasswordHelper::hashPassword($this->password);
        }
        return parent::beforeSave();
    }

    public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password, $this->password);
    }

    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }
}

?>