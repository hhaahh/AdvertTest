<?php
class NewsController extends Controller {

    public function actionIndex() {
        $this->pageTitle = 'Список новостей';
        $this->render('index');
    }

    public function actionGetNews() {
        $comments = Yii::app()->db->createCommand('SELECT * FROM news')->queryAll();
        $this->renderJSON($comments);
    }

    protected function renderJSON($data) {
        header('Content-type: application/json');
        echo CJSON::encode($data);
        Yii::app()->end();
    }
} 