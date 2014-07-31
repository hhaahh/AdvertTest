<?php
class JuiController extends Controller {
    public function actionIndex() {
        $this->render('index');
    }

    public function actionGetForm() {
        $this->renderPartial('getForm');
    }
}
