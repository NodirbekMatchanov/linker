<?php

use yii\db\Migration;
use yii\helpers\Console;

class m250419_062437_init_rbac_with_admin extends Migration
{
    public function safeUp()
    {
        // 1. Добавим пользователя "admin"
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('admin123'), // можешь сменить пароль
            'email' => 'admin@example.com',
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $userId = (new \yii\db\Query())
            ->select('id')
            ->from('{{%user}}')
            ->where(['username' => 'admin'])
            ->scalar();

        if (!$userId) {
            Console::output("❌ Не удалось найти пользователя admin.");
            return false;
        }

        // 2. Создаём роль admin через RBAC
        $auth = Yii::$app->authManager;

        if (!$auth->getRole('admin')) {
            $adminRole = $auth->createRole('admin');
            $adminRole->description = 'Administrator';
            $auth->add($adminRole);
        } else {
            $adminRole = $auth->getRole('admin');
        }

        // 3. Назначаем роль пользователю
        $auth->assign($adminRole, $userId);

        Console::output("✅ Админ создан и роль назначена (username: admin, password: admin123).");
    }

    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        // Удалим назначение
        $userId = (new \yii\db\Query())
            ->select('id')
            ->from('{{%user}}')
            ->where(['username' => 'admin'])
            ->scalar();

        if ($userId) {
            $auth->revokeAll($userId);
            $this->delete('{{%user}}', ['id' => $userId]);
        }

        if ($auth->getRole('admin')) {
            $auth->remove($auth->getRole('admin'));
        }

        Console::output("🔄 Откат: админ и роль удалены.");
    }
}
