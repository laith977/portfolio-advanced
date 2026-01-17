<?php

use common\models\Testimonial;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

?>
  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [

      'id',
      [
        'attribute' => 'project_id',
        'format' => 'raw',
        'filter' => $projects,
        'visible' => $isProjectColumnVisible,
        'value' => function ($model) {
          return Html::a($model->project->name, ['project/view', 'id' => $model->project_id]);
        }
      ],
      [
        'attribute' => 'customer_image_id',
        'format' => 'raw',
        'value' => function ($model) {
          if (!$model->customerImage) {
            return null;
          }
          return Html::img(
            $model->customerImage->absoluteUrl(),
            [
              'alt' => $model->customer_name,
              'height' => '75',
            ],


          );
        }
      ],
      'title',
      'customer_name',
      //'review:ntext',
      'rating',
      [
        'class' => ActionColumn::className(),
        'urlCreator' => function ($action, Testimonial $model, $key, $index, $column) {
          return Url::toRoute(['testimonial/', $action, 'id' => $model->id]);
        }
      ],
    ],
  ]); ?>