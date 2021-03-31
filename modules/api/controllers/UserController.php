<?php

namespace app\modules\api\controllers;

class UserController extends \yii\rest\ActiveController
{
	public function behaviors()
	{
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	    return [
	        'corsFilter' => [
	            'class' => \yii\filters\Cors::className(),
	        ],
	    ];
	}

	public $modelClass = 'app\modules\api\models\User';
    // public function actionIndex()
    // {
    //     return $this->render('index');
    // }

}
