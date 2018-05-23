<?php

namespace app\controllers;

use yii;
use app\models\License;

class LicenseController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $model = new License();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', compact('model'));
    }

    public function actionDelete($id)
    {
        License::findOne($id)->delete();
        return $this->redirect(['/license/index']);
    }

    public function actionIndex()
    {
        $model = License::find()->orderBy('id')->all();;

        return $this->render('index', compact('model'));
    }

    public function actionUpdate($id)
    {
        $model = License::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', compact('model'));
    }

    public function actionView($id)
    {
        $model = License::findOne($id);
        return $this->render('view', compact('model'));
    }

}
