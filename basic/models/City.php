<?php
/**
 * Created by PhpStorm.
 * User: Lord
 * Date: 20.01.2016
 * Time: 0:58
 */

namespace app\models;


use yii\db\ActiveRecord;

class City extends ActiveRecord
{
    public static function tableName()
    {
        return 'city';
    }
}