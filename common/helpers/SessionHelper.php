<?php
namespace common\helpers;

use Yii;
use \common\models\ProfilUser;

class SessionHelper {

    public static function setPengerjaanMurid(){
        $session = Yii::$app->session;
        $session->set('pengerjaan_'.Yii::$app->user->identity->username, [
            'waktu_mulai' => time(),
        ]);
        return true;
    } 
    
    public static function getPengerjaanMurid(){
        $session = Yii::$app->session;
        if ($session->has('pengerjaan_'.Yii::$app->user->identity->username))
            return $session->get('pengerjaan_'.Yii::$app->user->identity->username);
        return null;
    } 

    public static function selesaiPengerjaanMurid(){
        $session = Yii::$app->session;
        $session->remove('pengerjaan_'.Yii::$app->user->identity->username);
        return true;
    } 
}