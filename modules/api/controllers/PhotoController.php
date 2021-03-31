<?php

namespace app\modules\api\controllers;

use app\modules\api\models\UploadForm;
use yii\web\UploadedFile;

class PhotoController extends \yii\rest\ActiveController
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

	public $modelClass = 'app\modules\api\models\Photo';

	public function actions()
	{
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
	}



    public function actionCreate()
    {

        $model = new UploadForm();

        $model->load(\Yii::$app->request->post(), '');
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            return $model->upload();
            // if ($model->upload()) {
                // file is uploaded successfully
		        // return 'Изображение успешно загружено';
            // }
        
        // return 'Пизда';


    }

}
