<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Link extends ActiveRecord
{
    public static function tableName()
    {
        return 'links';
    }

    public function rules()
    {
        return [
            [['original_url', 'short_url', 'qr_code'], 'required'],
            [['clicks','scans'], 'integer'],
            [['expires_at'], 'safe'],
            [['original_url', 'short_url', 'qr_code'], 'string', 'max' => 255],
        ];
    }

    // Метод для создания короткой ссылки
    public static function generateShortUrl($url)
    {
        // Генерация короткой ссылки (можно использовать более сложные алгоритмы или сторонние сервисы)
        return substr(md5($url . time()), 0, 6);
    }

    
}
