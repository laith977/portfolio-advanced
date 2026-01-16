<?php


/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Help';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="help-index">
  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    This is the Help page. You may modify the following file to customize its content:
  </p>

  <?php
  echo Html::a('Account Settings Help', ['help/account-settings'], ['class' => 'btn btn-primary']);
  echo ' ';
  echo Html::a('Login and Security Help', ['help/login-and-security'], ['class' => 'btn btn-primary']);
  echo ' ';
  echo Html::a('Privacy Policy Help', ['help/privacy'], ['class' => 'btn btn-primary']);
  ?>