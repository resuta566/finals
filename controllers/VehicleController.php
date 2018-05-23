<?php

namespace app\controllers;
use yii;
use app\models\Vehicle;

class VehicleController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $model = new Vehicle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', compact('model'));
    }

    public function actionDelete($id)
    {
        Vehicle::findOne($id)->delete();
        return $this->redirect(['/vehicle/index']);
    }

    public function actionIndex()
    {
        $model = Vehicle::find()->orderBy('id')->all();;

        return $this->render('index', compact('model'));
    }

    public function actionUpdate($id)
    {
        $model = Vehicle::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', compact('model'));
    }

    public function actionView($id)
    {
        $model = Vehicle::findOne($id);
        return $this->render('view', compact('model'));
    }

}
