<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use \app\rbac\UserGroupRule;

/**
 *  !!! В данном проекте не используется
 * Генерирование файлов разрешений
 * Перед выполнением этой команды нужно удалить файлы
 * @app/rbac/items.php и @app/rbac/rules.php чтобы избежать конфликтов слияния
 *
 * ./yii rbac/init
 *
 * В директории @app/rbac должны появиться два файла:
 * app/rbac/items.php
 */
class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;
        $authManager->removeAll(); //удалить все предыдущие
        // Создание роелй
        $guest = $authManager->createRole('guest');
        $brand = $authManager->createRole('moder');
        $talent = $authManager->createRole('user');
        $admin = $authManager->createRole('admin');

        // Создайте простые разрешения/permissions на основе действия{$NAME}
        $login = $authManager->createPermission('login');
        $logout = $authManager->createPermission('logout');
        $error = $authManager->createPermission('error');
        $signUp = $authManager->createPermission('sign-up');
        $index = $authManager->createPermission('index');
        $view = $authManager->createPermission('view');
        $update = $authManager->createPermission('update');
        $delete = $authManager->createPermission('delete');

        // Добавить permissions in Yii::$app->authManager
        $authManager->add($login);
        $authManager->add($logout);
        $authManager->add($error);
        $authManager->add($signUp);
        $authManager->add($index);
        $authManager->add($view);
        $authManager->add($update);
        $authManager->add($delete);


        // Add rule, based on UserExt->group === $user->group
//        $userGroupRule = new UserGroupRule();
//        $authManager->add($userGroupRule);
//
//        // Add rule "UserGroupRule" in roles
//        $guest->ruleName = $userGroupRule->name;
//        $brand->ruleName = $userGroupRule->name;
//        $talent->ruleName = $userGroupRule->name;
//        $admin->ruleName = $userGroupRule->name;

        // Add roles in Yii::$app->authManager
        $authManager->add($guest);
        $authManager->add($brand);
        $authManager->add($talent);
        $authManager->add($admin);

        // Add permission-per-role in Yii::$app->authManager
        // Guest
        $authManager->addChild($guest, $login);
        $authManager->addChild($guest, $logout);
        $authManager->addChild($guest, $error);
        $authManager->addChild($guest, $signUp);
        $authManager->addChild($guest, $index);
        $authManager->addChild($guest, $view);

        // moder
        $authManager->addChild($brand, $update);
        $authManager->addChild($brand, $guest);

        // user
        $authManager->addChild($talent, $update);
        $authManager->addChild($talent, $guest);

        // Admin
        $authManager->addChild($admin, $delete);
        $authManager->addChild($admin, $talent);
        $authManager->addChild($admin, $brand);
    }

    /**
     * Добавить роль
     * php yii rbac/role
     * @return void
     */
    public function actionRole()
    {
        $authManager = \Yii::$app->authManager;
        $role = $authManager->createRole('demo');
        $authManager->add($role);
        $this->stdout('Добавлено!' . PHP_EOL);
    }

}