<?php
class MerchantController extends CController
{
    public function actionIndex()
    {
        $merchants = Merchant::model()->findAll();
        $this->render('index', array('merchants' => $merchants));
    }

    public function actionView($id)
    {
        $merchant = Merchant::model()->findByPk($id);
        $services = Service::model()->findAllByAttributes(array('merchant_id' => $id));
        $this->render('view', array('merchant' => $merchant, 'services' => $services));
    }
}

?>