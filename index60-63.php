<?php

// 60
// 59の続き、
// Memberクラスを改修する
// Memberというクラスは名前と年齢を持つ事ができる。
// setNameというメソッドで名前を設定する。
// setAgeというメソッドで年齢を設定する。
// showというメソッドでセットされた名前を出力する機能を作成しなさい。
// 出力例　山田太郎さんは１１歳です。
// class Member {
//     public $name;
//     public $age;

//     public function setName(){
//         $this->name = trim(fgets(STDIN));
//     }

//     public function setAge(){
//         echo "年齢を設定してください\n";
//         $this->age= trim(fgets(STDIN));
//     }

//     public function show(){
//         $this->setName();
//         $this->setAge();
//         echo sprintf("%sさんは%d歳です。", $this->name, $this->age);
//     }    
// }
// //インスタンス
// $member = new Member;
// //出力
// echo $member->show();
// // ↓修正箇所：セッターメソッドの扱いについて
// class Member {
//     public $name;
//     public $age;

//     public function setName(){
//         $this->name = "Taro";
//     }

//     public function setAge(){
//         $this->age= 29;
//     }

//     public function show(){
//         $this->setName();
//         $this->setAge();
//         echo sprintf("%sさんは%d歳です。\n", $this->name, $this->age);
//     }    
// }
// //インスタンス
// $member = new Member;
// //出力
// echo $member->show();

// ↓修正箇所2：固定値になっているところの修正
// class Member {
//     public $name;
//     public $age;

//     public function setName($name){
//         $this->name = $name;
//     }

//     public function setAge($age){
//         $this->age = $age;
//     }

//     public function show(){
//         echo sprintf("%sさんは%d歳です。\n", $this->name, $this->age);
//     }    
// }
// //インスタンス
// $member = new Member;
// $member->setName('Tanaka');
// $member->setAge('29');
// //出力
// $member->show();



// // // 61
// // // 60の続き、
// // // 3人の情報を持ちたい
// // // Memberクラスの配列を作りなさい。
// // // それぞれの名前、年齢はは適当に入力すること
// // class Member {
// //     public $name;
// //     public $age;
// // 
// //     public function setName(){
// // ​
// //         $this->name = ['Mikel', 'Tom', 'Mary'];
// //     }
// // ​
// //     public function setAge(){
// //         $this->age = [26, 28, 23];
// //     }
// // ​
// //     public function show(){
// //         $this->setName();
// //         $this->setAge();
// //         for ($i=0; $i < count($this->name); $i++) { 
// //             echo sprintf("%sさんは%d歳です。\n", $this->name[$i], $this->age[$i]);
// //         }
// //     }    
// // }
// // //インスタンス
// // $member = new Member;
// // //出力
// // echo $member->show();
// //↓訂正箇所：オブジェクト指向に沿ったクラスの作成。

// class Member {
//     public $name;
//     public $age;

//     public function setName($name){
//         $this->name = $name;
//     }

//     public function setAge($age){
//         $this->age = $age;
//     }

//     public function show(){
//         echo sprintf("%sさんは%d歳です。\n", $this->name, $this->age);
//     }    
// }

// //インスタンス生成
// $michel = new Member;
// $michel->setName('Michel');
// $michel->setAge('27');
// $mary = new Member;
// $mary->setName('Mary');
// $mary->setAge('29');
// $tom = new Member;
// $tom->setName('Tom');
// $tom->setAge('20');

// //インスタンスを配列に格納
// $members = array();
// $members[] = $michel;
// $members[] = $mary;
// $members[] = $tom;

// //出力
// for ($i=0; $i < count($members); $i++) { 
//     $members[$i]->show();
// }


// // // 62
// // // 61の続き、
// // // 名前と年齢をコンストラクターで登録するMemberクラスを作成し、インスタンス生成しなさい。
// // // showメソッドで出力結果を確認すること
// // class Member {
// //     public $name;
// //     public $age;

// //     public function __construct($name, $age){
// //         $this->name[] = $name;
// //         $this->age[] = $age;
// //     }

// //     public function setName(){
// //         $name =['Mikel', 'Tom', 'Mary'];
// //         $this->name = array_merge($name, $this->name);
// //     }

// //     public function setAge(){
// //         $age = [26, 28, 23];
// //         $this->age = array_merge($age, $this->age);
// //     }

// //     public function show(){
// //         $this->setName();
// //         $this->setAge();
// //         for ($i=0; $i < count($this->name); $i++) { 
// //             echo sprintf("%sさんは%d歳です。\n", $this->name[$i], $this->age[$i]);
// //         }
// //     }    
// // }
// // //インスタンス
// // $member = new Member('Ken', 18);
// // //出力
// // echo $member->show();
// // ↓訂正箇所：オブジェクト指向にそったクラスの作成

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
// class HumanBase {
//     public $human_count;
//     public $language;

//     public function getLanguage($language){
//         $this->language = $language;
//         echo sprintf("現在%sを使用しています。\n", $this->language);
//     }
// }
// $human_base = new HumanBase;
// echo $human_base->getLanguage('Japanese');
//↓修正箇所：カプセル化について、privateを使う
// class HumanBase {
//     public $human_count;
//     private $language;

//     public function getLanguage(){
//         return sprintf("現在%sを使用しています。\n", $this->language);
//     }
//     public function setLanguage($updateLanguage){
//         $this->language = $updateLanguage;
//     }
// }
// $human_base = new HumanBase();
// $human_base -> setLanguage('Japanese');
// echo $human_base->getLanguage();
//↓修正箇所２：ゲッターメソッドを値を返すだけの記述に
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