<?php

namespace app\controllers;

use app\models\Generator;
use yii\filters\Cors;
use yii\rest\Controller;

class ApiController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['corsFilter'] = [
            'class' => Cors::class,
            'cors' => [
                // restrict access to
                'Origin' => ['*'],
                'Access-Control-Allow-Origin' => ['*'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => true,
            ],

        ];

        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
            ]
        ];
        return $behaviors;
    }

    public function actionGenerate()
    {

        $randNum = rand(10, PHP_INT_MAX);

        $generator = new Generator();
        $generator->generate_key = $randNum;
        $generator->created_at = date('Y-m-d H:i:s', time());
        $generator->save();

        return ['status' => 'SUCCESS', 'id' => $generator->id, 'key' => $generator->generate_key, 'created_at' => $generator->created_at];
    }

    public function actionRetrieve($id)
    {
        if ($generator = Generator::find()->where(['id' => $id])->one()) {
            return ['status' => 'SUCCESS', 'id' => $generator->id, 'key' => $generator->generate_key, 'created_at' => $generator->created_at];
        }

        return ['status' => 'SUCCESS', 'message' => 'id not found'];
    }

}
