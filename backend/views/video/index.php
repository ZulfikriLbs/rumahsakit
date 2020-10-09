<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\View;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TaVideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Video Materi';
$this->params['breadcrumbs'][] = $this->title;


CrudAsset::register($this);

$this->registerJs(
    "$(document).on('click', '#tutup-video', function() { $('#ta-video-view-video').html(''); });",
    View::POS_END,
    'tutup-video-handler'
);
$this->registerJsFile(
    '@web/js/math.js',
    [
        'position' => View::POS_END,
        'depends' => [\yii\web\JqueryAsset::className()],
    ]
);
$this->registerJsFile(
    'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js',
    [
        'id' => 'MathJax-script',
        'async' => 'async',
        'position' => View::POS_END,
        'depends' => [\yii\web\JqueryAsset::className()],
    ]
);



?>

<div class="ta-video-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="fas fa-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Unggah Video Materi Baru','class'=>'btn btn-default']).
                    Html::a('<i class="fas fa-redo"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'summary' => "Menampilkan <b>{begin} - {end}</b> dari <b>{totalCount}</b> item", 
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="fas fa-list"></i> Daftar Video',
                'before'=>'<em>* Ubah ukuran kolom dengan menggeser garis tepi tabel.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="fas fa-trash"></i>&nbsp; Delete All',
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii dat
                                    'data-confirm-title'=>'Kamu yakin?',
                                    'data-confirm-message'=>'Apakah kamu yakin menghapus data ini?'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>

<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    'closeButton' => false,
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
