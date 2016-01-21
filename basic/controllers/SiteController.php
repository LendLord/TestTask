<?php

namespace app\controllers;

use app\models\AddUser;
use app\models\LocationSearch;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdduser()
    {
        $model = new AddUser();
        if ($model->load(Yii::$app->request->post()) && $model->addUser()) {
            Yii::$app->session->setFlash('userAdded');

            return $this->refresh();
        }
        return $this->render('adduser', [
            'model' => $model
        ]);
    }

    public function actionUsers(){

        $searchModel = new LocationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('users',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
