<?php
class AdvertController extends Controller {
    public function actionAdmin() {
        $model = new Advert('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Advert']))
            $model->attributes = $_GET['Advert'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionCreate() {
        $model = new Advert;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Advert'])) {
            $model->attributes = $_POST['Advert'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Advert'])) {
            $model->attributes = $_POST['Advert'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionDeleteImage($id) {
        $model = AdvertImage::model()->findByPk((int)$id);
        if($model) {
            $model->delete();
        } else {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function loadModel($id) {
        $model = Advert::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
}