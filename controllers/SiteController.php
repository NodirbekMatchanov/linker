<?php

namespace app\controllers;

use app\models\Link;
use app\models\UrlForm;
use app\services\QrService;
use app\services\UrlService;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new UrlForm();
        $modelContact = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Логика для генерации QR-кода и короткой ссылки
            // Например, можно использовать стороннюю библиотеку для генерации QR
            $qrCode = $this->generateQrCode($model->url);
            $shortUrl = $this->generateShortUrl($model->url);

            return $this->render('index', [
                'model' => $model,
                'qrCode' => $qrCode,
                'shortUrl' => $shortUrl,
            ]);
        }

        return $this->render('index', [
            'model' => $model,
            'modelContact' => $modelContact,
        ]);
    }

    // Метод для обработки формы с URL
    public function actionCreateLink()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new UrlForm();

        if ($model->load(Yii::$app->request->post())) {
            $service = new UrlService();
            $result = $service->createShortUrl($model->url);

            return $result['success']
                ? ['status' => 'success', 'shortUrl' => $result['shortUrl'], 'qrCode' => $result['qrCode']]
                : ['status' => 'error', 'message' => $result['message']];
        }

        return ['status' => 'error', 'message' => 'Неверные данные формы.'];
    }


}
