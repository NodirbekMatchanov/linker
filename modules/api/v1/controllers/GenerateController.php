<?php

namespace app\modules\api\v1\controllers;

use yii\rest\ActiveController;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class GenerateController extends ActiveController
{
    public $modelClass = 'app\models\Links';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
