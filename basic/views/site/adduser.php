<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Country;
use app\models\City;
use app\models\Region;

$this->title = 'Добавить пользователя';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->session->hasFlash('userAdded')): ?>

        <div class="alert alert-success">
            Пользователь успешно добавлен
        </div>

    <?php endif; ?>

    <p>
       Добавление пользователя
    </p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'adduser-form']); ?>

            <?= $form->field($model, 'name')->label('Имя') ?>

            <?= $form->field($model, 'email')->label('email') ?>

            <?php
                $countries = Country::find()->all();
                $items = ArrayHelper::map($countries, 'id', 'country');
                $options = ['prompt' => 'Выберите страну...'];
                echo $form->field($model, 'country')->dropDownList($items,$options)->label('Страна');
            ?>

            <?php
                $cities = City::find()->all();
                $items = ArrayHelper::map($cities, 'id', 'city');
                $options = ['prompt' => 'Выберите город...'];
                echo $form->field($model, 'city')->dropDownList($items,$options)->label('Город');
            ?>

            <?php
                $regions = Region::find()->all();
                $items = ArrayHelper::map($regions, 'id', 'region');
                $options = ['prompt' => 'Выберите регион...'];
                echo $form->field($model, 'region')->dropDownList($items,$options)->label('Регион');
            ?>


            <div class="form-group">
                <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
