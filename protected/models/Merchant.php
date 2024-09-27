<?php
class Merchant extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'merchants'; // Nama tabel di database
    }

    public function relations()
    {
        return array(
            'services' => array(self::HAS_MANY, 'Service', 'merchant_id'),
        );
    }
}

?>