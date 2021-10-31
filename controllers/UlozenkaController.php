<?php

namespace app\controllers;

use yii\filters\ContentNegotiator;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class UlozenkaController extends \yii\rest\Controller
{
    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => ['application/json' => Response::FORMAT_JSON],
            ],
        ];
    }

    public function actionIndex()
    {
        return \Yii::$app->ulozenka->getBranches();
    }

    public function actionView($id)
    {
        $branch = \Yii::$app->ulozenka->getBranch($id);
        if ($branch === null)
            throw new NotFoundHttpException();

        return $branch;
    }
}
