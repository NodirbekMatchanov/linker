<?php
/**
 * Created by PhpStorm.
 * User: Rare
 * Date: 09.04.2025
 * Time: 8:59
 */

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

class RedirectController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [

            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    // Редирект на оригинальную ссылку по короткой ссылке
    public function actionGo($code)
    {
        $link = Link::findOne(['short_url' => $code]);

        if ($link) {
            // Логируем переход (IP пользователя)
            $ip = Yii::$app->request->getUserIP();
            Yii::$app->db->createCommand()->insert('click_logs', [
                'link_id' => $link->id,
                'ip_address' => $ip,
                'created_at' => time(),
            ])->execute();

            // Увеличиваем счетчик кликов
            $link->clicks++;
            $link->save();

            return $this->redirect($link->original_url);
        }

        return $this->goHome();  // Если ссылка не найдена, возвращаем на главную
    }

}