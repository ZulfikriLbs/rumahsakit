<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administrator\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Siswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			//'id',
			'username',
			//'auth_key',
			//'password_hash',
			//'password_reset_token',
			
			[
				'attribute' => 'online',
				'format' => 'raw',
				'options' => [
					'width' => '80px',
				],
				'value' => function ($data) {
					if ($data->online )
						return "<i class='fas fa-circle text-success text-center'></i>";
					else
						return "<i class='fas fa-circle text-danger text-center'></i>";
				}
			],
			
			[
				'options' => [
					'width' => '200px',
				],
				'class' => 'yii\grid\ActionColumn',
				'template' => '{register}',
				'buttons' => [
					'register' => function ($url, $model){
						return Html::a('Hasil Latihan', ['register-pengerjaan/', 'RegisterPengerjaanSearch[id_user]' => $model->id, 'role' => 'guru'], ['class' => 'btn btn-primary btn-block', 'role'=>'modal-remote']);
					},
				]
			],
		],
	]); ?>

</div>
