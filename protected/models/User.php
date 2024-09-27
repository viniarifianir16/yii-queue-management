<?php
class User extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'users'; // Nama tabel di database
    }

    public function rules()
    {
        return array(
            array('username, email, password', 'required'),
            array('username', 'length', 'max' => 50),
            array('email', 'length', 'max' => 100),
            array('password', 'length', 'max' => 255),
        );
    }

    public function beforeSave()
    {
        if ($this->isNewRecord || $this->isAttributeChanged('password')) {
            // Hash the password before saving if it's a new record or the password is changed
            $this->password = CPasswordHelper::hashPassword($this->password);
        }
        return parent::beforeSave();
    }
}

?>