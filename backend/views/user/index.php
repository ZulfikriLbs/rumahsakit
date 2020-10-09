<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administrator\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Akun Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Tambah Pengguna', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

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
			'email:email',
			[

				'label'	=> 'Peran',
				'attribute' => 'roles',
				'format' => 'raw',
				'value' => function ($data) {
					$roles = [];
					foreach ($data->roles as $role) {
						$roles[] = $role->item_name;
					}
					return Html::a(implode(', ', $roles), ['view', 'id' => $data->id]);
				}
			],
			[
				'attribute' => 'status',
				'format' => 'raw',
				'options' => [
					'width' => '80px',
				],
				'value' => function ($data) {
					if ($data->status == 10)
						return "<span class='label label-primary'>" . 'Aktif' . "</span>";
					else
						return "<span class='label label-danger'>" . 'Non-Aktif' . "</span>";
				}
			],
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
				'label'	=> 'Tanggal Dibuat',
				'attribute' => 'created_at',
				'format' => ['date', 'php:d M Y H:i:s'],
				'options' => [
					'width' => '120px',
				],
			],
			[
				'label'	=> 'Tanggal Diubah',
				'attribute' => 'updated_at',
				'format' => ['date', 'php:d M Y H:i:s'],
				'options' => [
					'width' => '120px',
				],
			],
			[
				'options' => [
					'width' => '80px',
				],
				'class' => 'yii\grid\ActionColumn',
				'template' => '{register}{view}{update}',
				'buttons' => [
					'register' => function ($url, $model){
						return Html::a('Register', ['register-pengerjaan/', 'RegisterPengerjaanSearch[id_user]' => $model->id], ['class' => 'btn btn-primary btn-block', 'role'=>'modal-remote']);
					},
					'view' => function ($url, $model){
						return Html::a('Lihat', $url, ['class' => 'btn btn-info btn-block', 'role'=>'modal-remote']);
					},
					'update' => function ($url, $model){
						return Html::a('Ubah', $url, ['class' => 'btn btn-success btn-block', 'role'=>'modal-remote']);
					},
					'delete' => function ($url, $model){
						return Html::a('Hapus', $url, [
							'class' => 'btn btn-danger btn-block', 
							'role'=>'modal-remote',
							'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
							'data-request-method'=>'post',
							'data-toggle'=>'tooltip',
							'data-confirm-title'=>'Kamu yakin?',
							'data-confirm-message'=>'Apakah kamu yakin ingin menghapus data ini?'
						]);
					},
				
			]
			],
		],
	]); ?>

</div>
