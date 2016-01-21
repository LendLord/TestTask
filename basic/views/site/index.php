<?php

/* @var $this yii\web\View */

use app\models\Location;
use yii\grid\GridView;
use \yii\data\ActiveDataProvider;
use \yii\data\ArrayDataProvider;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Немного статистики</h1>

        <p class="lead">Здесь Вы можете просмотреть статистку о пользователях в бд.</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Топ стран</h2>

                <?php
                    $dataProvider = new ActiveDataProvider(['query' => Location::find()
                        ->joinWith('country')
                        ->select(['country_id', 'country', 'COUNT(*) AS cnt'])
                        ->where('country != ""')
                        ->groupBy('country')
                        ->orderBy('cnt DESC')
                        ->limit(5)
                    ]);
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'country.country',
                            'cnt'
                        ],
                        'layout'=>"{items}",
                    ]);
                ?>
            </div>
            <div class="col-lg-4">
                <h2>Топ регинов</h2>

                <?php
                    $dataProvider = new ActiveDataProvider(['query' => Location::find()
                        ->joinWith('region')
                        ->select(['region_id', 'region', 'COUNT(*) AS cnt'])
                        ->where('region != ""')
                        ->groupBy('region')
                        ->orderBy('cnt DESC')
                        ->limit(5)
                    ]);
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'region.region',
                            'cnt'
                        ],
                        'layout'=>"{items}",
                    ]);
                ?>
            </div>
            <div class="col-lg-4">
                <h2>Пустые города</h2>

                <?php
                $dataProvider = new ArrayDataProvider(['allModels' => Location::find()
                    ->joinWith('city', false, 'RIGHT JOIN')
                    ->select(['city_id', 'city.city'])
                    ->where('location.id IS NULL')
                    ->asArray()
                    ->all()
                ]);
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'label' => 'Город',
                            'value' => 'city'
                        ]
                    ],
                    'layout'=>"{items}",
                ]);
                ?>

            </div>
        </div>

    </div>
</div>
