<?php
namespace app\services;

use app\models\Link;
use yii\helpers\Url;

class UrlService
{
    public function createShortUrl($url)
    {
        // Проверка доступности URL
        if (!$this->checkUrlAvailability($url)) {
            return ['success' => false, 'message' => 'URL недоступен'];
        }

        $short = substr(md5($url . microtime()), 0, 6);
        $shortUrl = Url::to(['/go/'. $short], true);
        // Генерация QR (условная, ты можешь вставить генератор)
        $qrService = new QrService();
        $qr = $qrService->generate($shortUrl);

        $link = new Link([
            'original_url' => $url,
            'short_url' => $short,
            'qr_code' => $qr,
            'created_at' => time(),
        ]);
        if ($link->save()) {
            return [
                'success' => true,
                'shortUrl' => $shortUrl,
                'qrCode' => $qr
            ];
        }

        return ['success' => false, 'message' => 'Ошибка при сохранении'];
    }

    private function checkUrlAvailability($url)
    {
        $headers = @get_headers($url);
        return $headers && strpos($headers[0], '200') !== false;
    }
}
