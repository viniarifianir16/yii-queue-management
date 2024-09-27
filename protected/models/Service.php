<?php
class Service extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'services'; // Nama tabel di database
    }

    public function relations()
    {
        return array(
            'merchant' => array(self::BELONGS_TO, 'Merchant', 'merchant_id'),
        );
    }
}

?>