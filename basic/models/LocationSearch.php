<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;


class LocationSearch extends Location
{
    public $country;
    public $city;
    public $region;

    /**
     * @return array
     */
    public function rules() {
        return [
            [['country', 'city', 'region'], 'safe']
        ];
    }

    /**
     * Поиск
     * @param $params
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Location::find();
        $query->joinWith(['country','city','region','users']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['users.name','users.email', 'country', 'region','city']],
            'pagination' => [
                'pagesize' => 5,
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andWhere('country LIKE "%' . $this->country . '%"');
        $query->andWhere('city LIKE "%' . $this->city . '%"');
        $query->andWhere('region LIKE "%' . $this->region . '%"');

        return $dataProvider;
    }
}