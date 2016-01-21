<?php
namespace app\models;

use Yii;
use yii\base\Model;

class AddUser extends Model
{
    /**
     * Имя пользователя
     * @var string $name
     */
    public $name;

    /**
     * Почта пользователя
     * @var string $email
     */
    public $email;

    public $country;
    public $region;
    public $city;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['name', 'email'], 'string', 'max' => 255],
            [['country', 'region', 'city'], 'safe'],
            ['email', 'email'],
        ];
    }

    public function addUser()
    {
        if ($this->validate()){

            $user = new Users;
            $location = new Location();

            $user->name = $this->name;
            $user->email = $this->email;
            $user->save();

            $location->user_id = $user->id;
            $location->city_id = $this->city;
            $location->region_id = $this->region;
            $location->country_id = $this->country;
            $location->save();
            return true;
        }

        return false;
    }

}