<?php

/*
たとえば、マルチユーザーの場合、複数のインスタンスが生成される場合がある。
ほかにも、複数のプレーヤーが同一のキャラクターを操作するような場合も、
それぞれのキャラクターが独立したステータスを持つ場合なども、こういった
ものに該当する（ゲームの例は本来PHPで実装すべき例ではない（JAVAやC#が妥当）
が、オブジェクト指向という意味で出してみた）。
一方、すべてのインスタンスから共通で参照できなくてはいけないデータも存在する。
たとえば、そのアプリケーションのバージョン情報などだ。これは、インスタンスが
違っても、同じ情報にアクセスできる必要があるため、こういう場合にstaticが用いられる。
今回は、そんなstaticの実装例を示す。
*/

class Config {
    public static $appName = "Vanila PHP app";
    public static $version = "1.0";

    public static function getAppInfo() {
        return self::$appName . " - Version: " . self::$version;
    }
}

// アプリケーションの設定にアクセス
echo Config::getAppInfo(); // MyApp - Version: 1.0