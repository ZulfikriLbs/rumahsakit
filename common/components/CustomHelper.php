<?php
namespace common\components;

use \common\models\ProfilUser;
use \common\models\RefKelas;

class CustomHelper {

    public static function buatImagedariText($text){
        
        if (strlen($text) == 1)
            $p1 = 25;
        else
            $p1 = 14;
        $im = imagecreatetruecolor(64, 64);
        
        // Create some colors
        $white = imagecolorallocate($im, 50, 18, 121);
        $grey = imagecolorallocate($im, 128, 128, 128);
        $black = imagecolorallocate($im, 255, 255, 255);
        imagefill($im, 0, 0, $white);
        
        // The text to draw
        //$text = '1';
        // Replace path by your own font path
        $font = \Yii::getAlias('@webroot').'/ttf-font/Roboto-Regular.ttf';
        
        // Add some shadow to the text
        //imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);
        
        // Add the text
        imagettftext($im, 20, 0, $p1, 40, $black, $font, $text);
        
        // Using imagepng() results in clearer text compared with imagejpeg()
        // start buffering
        ob_start();
        imagepng($im);
        $contents =  ob_get_contents();
        ob_end_clean();
        $imgData = base64_encode($contents);

        // Format the image SRC:  data:{mime};base64,{data};
        $src = 'data: '.'image/png'.';base64,'.$imgData;

        // Echo out a sample image
        
        imagedestroy($im);
        return $src;
    }

    public static function getImageUser(){
        $model = ProfilUser::find()->where(['id' => \Yii::$app->user->identity->id])->one();
        if (!$model)
            return \Yii::getAlias('@web').'/dist/img/user2-160x160.jpg';
        if (!$model->foto)
            return \Yii::getAlias('@web').'/dist/img/user2-160x160.jpg';
        $type = pathinfo($model->foto, PATHINFO_EXTENSION);
        if (file_exists($model->foto)) {
            $data = file_get_contents($model->foto);
        }
        else{
            return \Yii::getAlias('@web').'/dist/img/user2-160x160.jpg';
        }
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }

    public static function getUserFullName(){
        $model = ProfilUser::find()->where(['id' => \Yii::$app->user->identity->id])->one();
        if (!$model)
            return \Yii::$app->user->identity->username;
        return $model->nama;
    }

    public static function getKelas(){
        $model = ProfilUser::find()->where(['id' => \Yii::$app->user->identity->id])->one();
        if (!$model){
            $modelkelas = RefKelas::find()->where(['id_kelas' => \Yii::$app->user->identity->id_kelas])->one();
            if (!$modelkelas){
                return "-";
            }
            return $modelkelas->nm_kelas;
        }
        return $model->nama;
    }
}