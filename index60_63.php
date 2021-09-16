<?php

// 60
// 59の続き、
// Memberクラスを改修する
// Memberというクラスは名前と年齢を持つ事ができる。
// setNameというメソッドで名前を設定する。
// setAgeというメソッドで年齢を設定する。
// showというメソッドでセットされた名前を出力する機能を作成しなさい。
// 出力例　山田太郎さんは１１歳です。

class Member {
    public $name;
    public $age;

    public function setName($name){
        $this->name = $name;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function show(){
        echo sprintf("%sさんは%d歳です。\n", $this->name, $this->age);
    }
}
//インスタンス
$member = new Member;
$member->setName('Tanaka');
$member->setAge('29');
//出力
$member->show();



// // // 61
// // // 60の続き、
// // // 3人の情報を持ちたい
// // // Memberクラスの配列を作りなさい。
// // // それぞれの名前、年齢はは適当に入力すること

class Member {
    public $name;
    public $age;

    public function setName($name){
        $this->name = $name;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function show(){
        echo sprintf("%sさんは%d歳です。\n", $this->name, $this->age);
    }
}

//インスタンス生成
$michel = new Member;
$michel->setName('Michel');
$michel->setAge('27');
$mary = new Member;
$mary->setName('Mary');
$mary->setAge('29');
$tom = new Member;
$tom->setName('Tom');
$tom->setAge('20');

//インスタンスを配列に格納
$members = array();
$members[] = $michel;
$members[] = $mary;
$members[] = $tom;

//出力
for ($i=0; $i < count($members); $i++) {
    $members[$i]->show();
}


// // // 62
// // // 61の続き、
// // // 名前と年齢をコンストラクターで登録するMemberクラスを作成し、インスタンス生成しなさい。
// // // showメソッドで出力結果を確認すること

class Member {
    public $name;
    public $age;

    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }

    public function show(){
        echo sprintf("%sさんは%d歳です。\n", $this->name, $this->age);
    }
}
//インスタンス
$michel = new Member('Michel', 27);
$mary = new Member('Mary', 29);
$tom = new Member('Tom', 20);

$members = array();
$members[] = $michel;
$members[] = $mary;
$members[] = $tom;

//出力
for ($i=0; $i < count($members); $i++) {
    $members[$i]->show();
}

// // 63
// // 次のクラスをカプセル化し、$languageはアクセサメソッドからのみ、代入・参照できる様に修正しなさい
// // <?php
// //   class HumanBase {
// //     public $human_count;
// //     public $language = "Japanese";
// //   }
// //   $human_base = new HumanBase();
// //   echo $human_base->language;

class HumanBase {
    public $human_count;
    private $language;

    public function getLanguage(){
        return $this->language;
    }
    public function setLanguage($updateLanguage){
        $this->language = $updateLanguage;
    }
}
?>
