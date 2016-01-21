<?php
/**
 * Created by PhpStorm.
 * User: Lord
 * Date: 20.01.2016
 * Time: 1:30
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Location extends ActiveRecord
{

    public $cnt;

    public static function tableName()
    {
        return 'location';
    }

    public function attributeLabels() {
        return [
            'users.name' => Yii::t('app', 'Имя'),
            'users.email' => Yii::t('app', 'Email'),
            'country.country' => Yii::t('app', 'Страна'),
            'region.region' => Yii::t('app', 'Регион'),
            'city.city' => Yii::t('app', 'Город'),
            'cnt' => Yii::t('app', 'Людей'),
        ];
    }

    // Связи с таблицами
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}