<?php
/**
 * Created by PhpStorm.
 * User: Lord
 * Date: 16.01.2016
 * Time: 22:16
 */

namespace app\models;

use Yii;
use yii\base\Model;


class Index extends Model
{
    public function TestDataBase(){
//       add
        $User = new Users();
        $User->name = "test";
        $User->email = 'test@test.ru';
        $User->insert();

//        find
        $userToDelete = $User::findOne(['name' => 'test']);
        $curUserId = $userToDelete->getAttributes(['id']);
//        var_dump($curUserId);
//        update
        $userToDelete->name = (int)$curUserId+1005;
        $userToDelete->save();
//        delete
        if ($userToDelete) $userToDelete->delete();
//        show all
//        var_dump(Users::find()->asArray()->all());
    }
}