<?php

namespace app\commands;

use app\models\Users;
use Yii;
use yii\console\Controller;
use yii\console\Exception;
use yii\helpers\ArrayHelper;

/**
 *  Этот класс использовать в том случае,
 * если надо хранить роли в файле assignments.php
 * !!! В данном проекте роил храняться в табл. Users
 *
 *
 * Присвоение ролей и разрешений пользователям
 *
 * запуск действие привязки роли:
 * php yii roles/assign
 * Он попросит нас ввести логин пользователя и роль.
 *
 *
 */
class RolesController extends Controller
{
    /**
     * Adds role to user
     */
    public function actionAssign()
    {
        $username = $this->prompt('Username:', ['required' => true]);
        $user = $this->findModel($username);
        $roleName = $this->select('Role:', ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'description'));
        $authManager = Yii::$app->getAuthManager();
        $role = $authManager->getRole($roleName);
        $authManager->assign($role, $user->id);
        $this->stdout('Done!' . PHP_EOL);
    }

    /**
     * Removes role from user
     */
    public function actionRevoke()
    {
        $username = $this->prompt('Username:', ['required' => true]);
        $user = $this->findModel($username);
        $roleName = $this->select('Role:', ArrayHelper::merge(
            ['all' => 'All Roles'],
            ArrayHelper::map(Yii::$app->authManager->getRolesByUser($user->id), 'name', 'description'))
        );
        $authManager = Yii::$app->getAuthManager();
        if ($roleName == 'all') {
            $authManager->revokeAll($user->id);
        } else {
            $role = $authManager->getRole($roleName);
            $authManager->revoke($role, $user->id);
        }
        $this->stdout('Done!' . PHP_EOL);
    }

    /**
     * @param string $username
     * @return Users the loaded model
     * @throws \yii\console\Exception
     */
    private function findModel($username)
    {
        if (!$model = Users::findOne(['username' => $username])) {
            throw new Exception('User is not found');
        }
        return $model;
    }
}