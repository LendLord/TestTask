<?php
/**
 * Created by PhpStorm.
 * User: Lord
 * Date: 20.01.2016
 * Time: 0:57
 */

namespace app\models;


use yii\db\ActiveRecord;

class Region extends ActiveRecord
{

    public static function tableName()
    {
        return 'region';
    }
}