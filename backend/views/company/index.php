<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'phone',
            'mobile',
            'fax',
            // 'image',
            // 'sina',
            // 'webchat',
            // 'QQ',
            // 'email:email',
            // 'addr',
            // 'copyright',
            // 'add_user_id',
            // 'updated_user_id',
            // 'created_at',
            // 'updated_at',
            // 'status',
            // 'info',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>