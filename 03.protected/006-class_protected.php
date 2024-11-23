<?php


/*
protectedスコープの例：
クラス内部や継承されたクラスからはアクセス可能。
ただし、クラス外部からはアクセス不可能です。
privateは敬称されたクラスからはアクセスできませんので、
protectedはその点が緩和されたものだと言えます。
*/

class ParentClass {
    protected $data = "Protected Data";

    protected function showData() {
        return $this->data;
    }
}

class ChildClass extends ParentClass {
    public function getData() {
        return $this->showData(); // 継承クラス内ではアクセス可能
    }
}

$child = new ChildClass();
echo $child->getData(); // Protected Data
// echo $child->data; // エラー: protectedプロパティに外部から直接アクセスできない
