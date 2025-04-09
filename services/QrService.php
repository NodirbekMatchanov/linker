<?php


namespace app\services;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Yii;

class QrService
{
    public function generate(string $data, string $filename = null): string
    {
        $filename = $filename ?? md5($data . microtime()) . '.png';
        $savePath = Yii::getAlias('@webroot/uploads/qr/' . $filename);
        $webPath = Yii::getAlias('@web/uploads/qr/' . $filename);

        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($data)
            ->size(300)
            ->margin(10)
            ->build();

        // Убедись, что директория существует
        if (!file_exists(dirname($savePath))) {
            mkdir(dirname($savePath), 0775, true);
        }

        // Сохраняем
        $result->saveToFile($savePath);

        return $webPath;
    }
}
