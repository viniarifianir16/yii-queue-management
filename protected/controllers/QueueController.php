<?php
class QueueController extends CController
{
    public function actionCreate($service_id)
    {
        $queue = new Queue;
        $queue->user_id = Yii::app()->user->id;
        $queue->service_id = $service_id;
        $queue->merchant_id = Service::model()->findByPk($service_id)->merchant_id;
        $queue->queue_number = Queue::model()->countByAttributes(array('service_id' => $service_id)) + 1;
        $queue->queue_status = 'waiting';

        if ($queue->save()) {
            $this->redirect(array('view', 'id' => $queue->id));
        }
    }

    public function actionView($id)
    {
        $queue = Queue::model()->findByPk($id);
        $this->render('view', array('queue' => $queue));
    }
}

?>