<?php

// 56
// 55の続き、
// 54の連想配列を多次元連想配列としなさい。
// 次の情報で配列追加すること
// first_name => kelly
// last_name => clarkson
// age => 35
// favorite => singing

$child = [
    'first_name' => 'joe',
    'last_name' => 'jonathan',
    'age' => 12,
    'favorite' => 'spiderman'
];

$persons[] = $child;

$persons[] = [
    'first_name' => 'kelly',
    'last_name' => 'clarkson',
    'age' => 35,
    'favorite' => 'singing'
];





// 57
// 56の続き
// foreach文、for文を使って多次元配列を出力しなさい
// ex)
// 1人目
// name : joe jonathan
// age : 23
// favorite : music
// 2人目
// name : kelly clarkson
// age : 35
// favorite : singing
// foreach ($persons as $person) {
//     foreach ($person as $key => $value) {
//         if($key === 'first_name' || $key === 'last_name' ){
//             $keyName = mb_substr($key,-4);
//             $name .= $value." ";
//             if($key === 'last_name'){
//                 echo $keyName." : ".$name."\n";
//                 $name = "";
//             }
//         } else {
//             sprintf("%s : %s\n", $key, $value);
//         }
//     }
// }
// //↓訂正箇所：二重ループを消す。
// foreach ($persons as $person) {
//     echo sprintf("name : %s %s\n", $person["first_name"], $person["last_name"]);
//     echo sprintf("age : %d\n", $person["age"]);
//     echo sprintf("favorite : %s\n", $person["favorite"]);
// }
// //↓訂正箇所２：for文でも作成

// //foreach
// foreach ($persons as $person) {
//     echo sprintf("name : %s %s\n", $person["first_name"], $person["last_name"]);
//     echo sprintf("age : %d\n", $person["age"]);
//     echo sprintf("favorite : %s\n", $person["favorite"]);
// }

//for文
for ($i=0; $i < 2; $i++) { 
    echo sprintf("name : %s %s\n", $persons[$i]["first_name"], $persons[$i]["last_name"]);
    echo sprintf("age : %d\n", $persons[$i]["age"]);
    echo sprintf("favorite : %s\n", $persons[$i]["favorite"]);
}




// 58
// Memberというクラスを作成しなさい。
// 名前というmember変数を持つことができる。
// registというメソッドで名前を設定し、
// showというメソッドでセットされた名前を出力する機能を作りなさい。
// 出力例 山田太郎さんです。
// Memberクラスのインスタンスを生成し、registメソッドで名前設定後、
// showメソッドで名前を出力しなさい。
// class Member {
//     //プロパティ
//     public $regist = 'Tom';
// }
// //インスタンス
// $show = new Member();
// echo $show->regist;
//訂正箇所：
//registというメソッドで名前を設定し、
// showというメソッドでセットされた名前を出力する機能を作りなさい。

//クラス
class Member {
    public $name;

    public function regist(){
        $this->name = 'Mikel';
    }

    public function show(){
        $this->regist();
        echo $this->name;
    }
}

//インスタンス
$member = new Member;

//出力
echo $member->show();


// 59
// 58の続き、
// Memberクラスを改修する
// Memberというクラスは名前と年齢を持つ事ができる。
// registというメソッドで名前と年齢を設定し、
// showというメソッドでセットされた名前と年齢を出力する機能を作れ
// 出力例　山田太郎さんは１１歳です。
// Memberクラスのインスタンスを生成し、registメソッドを使用し登録。
// その後showメソッドを使用して出力しなさい。

class Member {
    public $name;
    public $age;

    public function regist(){
        $this->name = 'Mikel';
        $this->age= 26;
    }

    public function show(){
        $this->regist();
        echo sprintf("%sさんは%d歳です。", $this->name, $this->age);
    }    
}

//インスタンス
$member = new Member;

//出力
echo $member->show();



?>