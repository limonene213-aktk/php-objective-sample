<?php

class Hoge{
    public $color;
    public function hogeCall($i1, $i2=""){ //$i2にはデフォルト値を設定しているので引数は１個で機能する
        echo $i1;
        echo $i2;
        echo "\n";
    }
    public function hogeColor(){
        if(isset($this->color)){ //isset関数で値の存在確認
            echo "色が".$this->color."に設定されていますよ\n";
        }else{
            echo "色が未設定です\n";
        }
        
    }
}

$hoge_obj = new Hoge();

$hoge_obj->hogeColor();

$hoge_obj->color="red";

$hoge_obj->hogeCall("ほげええ");

$hoge_obj->hogeColor();

/*
さて、上記プログラムはきちんと動きますが、これでは品質が良いとは
言えません。コードは「動くからいい」のではありません。品質を向上
させる、たとえばエラー処理やその安全性を高めることが求められます。
一体どこがダメだったのでしょうか？みなさん、考えてみてください。
*/

?>