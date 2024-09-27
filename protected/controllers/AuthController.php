<?php
class AuthController extends CController
{
    public function actionRegister()
    {
        $model = new User;

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            // Hash the password before saving
            $model->password = CPasswordHelper::hashPassword($model->password);

            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Registration successful! You can now login.');
                $this->redirect(array('login'));
            } else {
                Yii::app()->user->setFlash('error', 'Registration failed. Please try again.');
            }
        }

        $this->render('register', array('model' => $model));
    }


    public function actionLogin()
    {
        $model = new LoginForm;

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login()) {
                $this->redirect(array('merchant/index'));
            }
        }

        $this->render('login', array('model' => $model));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}

?>