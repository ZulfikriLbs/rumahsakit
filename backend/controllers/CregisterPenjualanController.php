<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\TblObat;
use common\models\TblTransaksi;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;

/**
 * Site controller
 */
class CregisterPenjualanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'error',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new \yii\base\DynamicModel(['bulan', 'nama']);
        $modelObat = ArrayHelper::Map(TblObat::find()->all(), 'nm_obat', 'nm_obat');
        $request = Yii::$app->request;
        $model//->addRule(['nama','bulan'], 'required')
            ->addRule(['nama'], 'string', ['max' => 128])
            ->addRule(['bulan'], 'integer');
        if ($model->load($request->post())){
            // get your HTML raw content without any layouts or scripts
            $modelFilter = TblTransaksi::find();
            if ($model->nama){
                $modelFilter->where(['nm_obat' => $model->nama]);
            }
            if ($model->bulan){
                $dateAwal = date('Y').'-'.$model->bulan.'-'.'01';
                $dateAkhir = date('Y-m-t',strtotime($dateAwal));
                $modelFilter->andWhere(['between','tgl_transaksi', $dateAwal, $dateAkhir ]);
            }
            $content = $this->renderPartial('_reportView',[
                'data' => $modelFilter->all()
            ]);
            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_CORE, 
                // A4 paper format
                'format' => Pdf::FORMAT_A4, 
                // portrait orientation
                'orientation' => Pdf::ORIENT_LANDSCAPE, 
                // stream to browser inline
                'destination' => Pdf::DEST_BROWSER, 
                // your html content input
                'content' => $content,  
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting 
                //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                //'cssInline' => '.kv-heading-1{font-size:18px}', 
                // set mPDF properties on the fly
                'options' => ['title' => 'Data Obat'],
                // call mPDF methods on the fly
                'methods' => [ 
                    'SetHeader'=>['Data Rekam Obat'], 
                    'SetFooter'=>['{PAGENO}'],
                ]
            ]);
    
    // return the pdf output as per the destination setting
    return $pdf->render();
        }
        else{
            return $this->render('index', [
                'model' => $model,
                'modelObat' => $modelObat
            ]);
        }
        
    }

    
}
