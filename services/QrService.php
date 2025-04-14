<?php


namespace app\services;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Yii;

class QrService
{
    public function generate(string $data, string $filename = null): string
    {
        $saveDir = Yii::getAlias('@webroot/uploads/qr');
        $filename = $filename ?? md5($data . microtime()) . '.png';
        $savePath = Yii::getAlias('@webroot/uploads/qr/' . $filename);
        $webPath = Yii::getAlias('@web/uploads/qr/' . $filename);

        // Проверка и создание директории
        if (!is_dir($saveDir)) {
            mkdir($saveDir, 0755, true); // 0755 — права, true — рекурсивное создание
        }

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
