<?php

/*
＜参考＞
staticはスコープではなく、プロパティやメソッドに付与するキーワードです。
staticキーワードは「インスタンスを生成しなくても、
クラス自身からアクセス可能なメソッドやプロパティ」に対して使われます。
通常、インスタンスごとにデータが異なるのですが、staticはクラスというレベルで
データが共有されます。
*/

class Counter {
    public static $count = 0;

    public static function increment() {
        self::$count++;
    }
}

/*
上記で
self::$count++;
となっている部分に着目してみましょう。
これは$this->countではダメなのでしょうか？
実は、staticはプロパティやメソッドがクラスに属するのに対して、
非staticの場合はインスタンスに属すのです。
*/

Counter::increment(); // インスタンス化せずにクラス名::メソッドで呼び出し
echo Counter::$count; // 1


/*
比較：staticを用いた場合のコード例
class Counter {
    public static $count = 0;

    public static function increment() {
        self::$count++; // クラスの静的プロパティにアクセス
    }
}

Counter::increment(); // クラス名から直接呼び出せる
echo Counter::$count; // 1

上記のように、すべてのインスタンスで同じstaticプロパティを共有でき、
インスタンス化（new Counter();）しなくてもクラス名だけでアクセスが可能。
各インスタンス間で共通のデータを持たせる（カウンターなど）場合に便利。
*/

/*
比較：非staticの場合のコード例
class Counter {
    public $count = 0;

    public function increment() {
        $this->count++; // インスタンスのプロパティにアクセス
    }
}

$counter1 = new Counter(); // インスタンス1を作成
$counter1->increment();
echo $counter1->count; // 1

$counter2 = new Counter(); // インスタンス2を作成
$counter2->increment();
echo $counter2->count; // 1 (別のインスタンスなので別々に管理される)

このように、インスタンスごとに独立した状態を保つ、
$this->キーワードを用いてインスタンスのプロパティやメソッドを参照する、
必ずインスタンス化が必要で、new演算子を使ってオブジェクトを生成する必要がある、
などがいえる。
インスタンス間での共通データ保持ができないかわりに、逆に言えばインスタンスごとの
独立性を維持できる。

*/