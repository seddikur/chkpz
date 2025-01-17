<?php

namespace app\commands;

use yii\console\Controller;
use Yii;

/**
 *
 * Просмотр всех ролей пользователя Yii::$app->authManager->getRolesByUser($user->getId());
 */
class TestController extends Controller
{
    /**
     * Добавление прав/Permission
     *  php yii test/permission
     * для проверки Yii::$app->user->can('deleteUser')
     * @return void
     */
    public function actionPermission()
    {
        $authManager = \Yii::$app->authManager;

        // Создаем разрешение на доступ к странице управления пользователями.
        $permissionManageUsers = Yii::$app->authManager->createPermission('view_manage_users_page');

       // Добавляем своё описание к разрешению, чтобы не забыть для чего мы его создавали.
        $permissionManageUsers->description = 'Доступ к странице управления пользователями.';

        // Добавляем разрешение в систему через RBAC менеджер.
        $authManager->add($permissionManageUsers);
        $this->stdout('Добавил !' . PHP_EOL);
    }


    /** Привязка роли
     *  php yii test/give
     * @return void
     * @throws \Exception
     */
    public function actionGive()
    {
//        $permit = Yii::$app->authManager->getPermission('deleteUser');
        $permit = Yii::$app->authManager->getPermission('view_manage_users_page');
//        Yii::$app->authManager->assign($permit, Yii::$app->user->getId());
        // Ищем роль admin.
        $roleAdmin = Yii::$app->authManager->getRole('admin');

        //добавление ращ=зрешение пользователю
       Yii::$app->authManager->assign($permit, 1);

        // Добавляем (наследуем) разрешение для роли admin.
        Yii::$app->authManager->addChild($roleAdmin, $permit);
    }

}