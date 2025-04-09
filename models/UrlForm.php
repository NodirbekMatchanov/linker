<?php
/**
 * Created by PhpStorm.
 * User: Rare
 * Date: 08.04.2025
 * Time: 21:57
 */

namespace app\models;

use yii\base\Model;

class UrlForm extends Model
{
    public $url;
    public $statusMessage;

    // Правила валидации
    public function rules()
    {
        return [
            [['url'], 'required'],  // Поле обязательно
            [['url'], 'url', 'defaultScheme' => 'http', 'message' => 'Неверный формат URL'],  // Валидация URL
        ];
    }

    // Дополнительные пользовательские правила
    public function validateUrl()
    {
        // Проверяем доступность URL
        $headers = @get_headers($this->url);

        if ($headers && strpos($headers[0], '200')) {
            return true; // URL доступен
        }

        $this->addError('url', 'Данный URL не доступен');
        return false; // URL не доступен
    }

    // Дополнительно, можно добавить пользовательские сообщения
    public function attributeLabels()
    {
        return [
            'url' => 'URL-ссылка',
        ];
    }

    // Метод для валидации URL и доступности ресурса
    public function validate($attributeNames = null, $clearErrors = true)
    {
        // Сначала вызываем родительский метод для базовой валидации
        if (!parent::validate($attributeNames, $clearErrors)) {
            return false;
        }

        // Проверяем доступность URL
        return $this->validateUrl();
    }
}
