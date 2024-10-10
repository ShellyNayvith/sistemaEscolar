<?php

namespace app\components;

use Yii;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author zea
 */
class Util
{


    //encripta id y desencripta id
    public static function encrypt_decryptID($id,$bandera){
        //genera una cadena para ser usado por el encryptByKey
        $key = Yii::$app->params['banderaEncriptaciónId'];
        //en caso de que sea encriptar, la bandera será 1
        if($bandera==1){
            $encrypted = Yii::$app->security->hashData($id,$key,false);
        }elseif($bandera==2){
            $encrypted = Yii::$app->security->validateData($id,$key,false);
        }
        return $encrypted;
    }
}
