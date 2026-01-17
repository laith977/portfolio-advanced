<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = Yii::$app->name . ' - my portfolio';
?>

<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">

        <div class="container-fluid py-5 text-center">
            <?= Html::img('@web/images/photo.jpg', [
                'alt' => Yii::t('app', 'my image'),
                'class' => 'side-index__photo'
            ]) ?>

            <h1 class="side-index__h1"><?= Yii::t('app', 'Hi my name is laith') ?><h1>
                    <p class="fs-5 fw-light"><?= Yii::t('app', 'i love web dev') ?></p>
                    <p>
                        <?= Html::a(Yii::t('app', 'see my work'), ['/project'], ['btn btn-primary']) ?>

                    </p>
        </div>
    </div>

    <div class="body-content">

        <div class="row">

        </div>

    </div>
</div>