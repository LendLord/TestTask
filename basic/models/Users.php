<?php
/**
 * Created by PhpStorm.
 * User: Lord
 * Date: 16.01.2016
 * Time: 22:23
 */

namespace app\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{

    public static function tableName()
    {
        return 'users';
    }

    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'user_id']);
    }
}