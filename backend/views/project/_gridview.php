<?php

use common\models\Project;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

?>

    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [

        'id',
        'name',

        'start_date',
        'end_date',
        [
          'class' => ActionColumn::className(),
          'urlCreator' => function ($action, Project $model, $key, $index, $column) {
            return Url::toRoute([$action, 'id' => $model->id]);
          }
        ],
      ],
    ]); ?>