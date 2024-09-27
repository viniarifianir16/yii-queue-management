<?php
class Queue extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'queues'; // Nama tabel di database
    }

    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'service' => array(self::BELONGS_TO, 'Service', 'service_id'),
            'merchant' => array(self::BELONGS_TO, 'Merchant', 'merchant_id'),
        );
    }
}

?>