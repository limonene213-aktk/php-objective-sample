<?php

/*
ユーザーログイン時に、パスワードをハッシュ化して比較したり、
アクセストークンを生成するプロセスがありますが、これらは外部
に公開する必要もなく、また外部から触れることができる事も適切ではありません。
そこで、そのような場合にはClass内部のみの処理を行う必要があり、この場合には
$passwordHashにprivateを使います。
$passwordHashはこれ自体が真贋性保証情報として機能するため、改竄を受けたり
思わぬ変更を受けないようにprivateで保護しているということです。
今回は、ハッシュ化して保存したパスワードの真贋を検証するプログラムを例にします。
ただし、近年はLaravelなどのフレームワークが普及してきたため、以下のような自作
クラスを用いてログイン機能を実装することは稀になっています。
*/

class User {
    private $passwordHash;

    // パスワードをハッシュ化して保存
    public function setPassword($password) {
        $this->passwordHash = password_hash($password, PASSWORD_BCRYPT);
    }

    // パスワードが正しいか確認する
    public function verifyPassword($password) {
        return password_verify($password, $this->passwordHash);
    }
}

// 実際の利用例
$user = new User();
$user->setPassword('supersecretpassword');

// 外部からパスワードハッシュに直接アクセス不可
// echo $user->passwordHash; // エラーになる
if ($user->verifyPassword('supersecretpassword')) {
    echo "パスワード正解！";
}
