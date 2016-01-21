<?php

/**
 * @var $searchModel \app\models\LocationSearch
 */
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Просмотр пользователей';
$this->params['breadcrumbs'][] = $this->title
?>

<div class="site-index">

    <div class="jumbotron">
        <h1>Просмотр пользователей</h1>

        <p class="lead">Здесь Вы можете просмотреть пользователей в бд.</p>

    </div>

    <div class="body-content">

        <div class="row">
            <?php
            Pjax::begin();
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'users.name',
                    'users.email',

                    [
                        'value' => 'country.country',
                        'label' => 'Страна',
                        'attribute' => 'country',
                    ],
                    [
                        'value' => 'region.region',
                        'label' => 'Регион',
                        'attribute' => 'region',
                    ],
                    [
                        'value' => 'city.city',
                        'label' => 'Город',
                        'attribute' => 'city',
                    ],
                ],

            ]);
            Pjax::end();
            ?>
        </div>
    </div>
</div>