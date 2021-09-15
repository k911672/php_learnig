<?php
// // 64
// // 63の続き、
// // HumanBaseクラスのインスタンスを生成した際にインスタンスの生成回数を追加し、
// // インスタンスを生成した回数がわかる様にしなさい
// // 回数はコンストラクタ内で行うようにし、
// // インスタンスが生成された回数は、クラスの外から参照できるようにすること
// // $human_countをクラス変数として書き換えることで実現できる


// class HumanBase {
//     public static $human_count = 0;
//     private $language;

//     public function __construct(){
//         //thisだと生成されたインスタンス固有の値になってしまう
//         // ×$this->human_count ++;
//         //selfだとHumanBaseクラスの値になるので、HumanBaseクラス呼び出されるたび変数が更新される。
//         self :: $human_count ++;
//     }

//     public function getLanguage(){
//         return sprintf("現在%sを使用しています。\n", $this->language);
//     }

//     public function setLanguage($updateLanguage){
//         $this->language = $updateLanguage;
//     }
// }

// $human_base = new HumanBase;
// $human_base -> setLanguage('Japanese');
// echo $human_base->getLanguage();
// $human_base2 = new HumanBase;
// $human_base -> setLanguage('English');
// echo $human_base->getLanguage();
// $human_base3 = new HumanBase;
// $human_base -> setLanguage('Korea');
// echo $human_base->getLanguage();


// $count = HumanBase :: $human_count;
// echo $count;


// 65
// 64の続き、
// HumanBaseクラスを継承する、Humanクラスを作成しなさい
// 作成後、64で実行していたHumanBaseクラスのインスタンス生成で実行していた処理をHumanクラスに置き換えなさい
// class HumanBase {
//     public static $human_count = 0;
//     private $language;

//     public function __construct(){
//         self :: $human_count ++;
//     }

//     public function getLanguage(){
//         return sprintf("現在%sを使用しています。\n", $this->language);
//     }

//     public function setLanguage($updateLanguage){
//         $this->language = $updateLanguage;
//     }
// }

// class Human extends HumanBase {}

// $human_base = new Human;
// $human_base -> setLanguage('Japanese');
// echo $human_base->getLanguage();
// $human_base2 = new Human;
// $human_base -> setLanguage('English');
// echo $human_base->getLanguage();
// $human_base3 = new Human;
// $human_base -> setLanguage('Korea');
// echo $human_base->getLanguage();

// $count = Human :: $human_count;
// echo $count;
//↓修正箇所：->の間のスペースの統一（削除）
// class HumanBase {
//     public static $human_count = 0;
//     private $language;

//     public function __construct(){
//         self :: $human_count ++;
//     }

//     public function getLanguage(){
//         return sprintf("現在%sを使用しています。\n", $this->language);
//     }

//     public function setLanguage($updateLanguage){
//         $this->language = $updateLanguage;
//     }
// }

// class Human extends HumanBase {}

// $human_base = new Human;
// $human_base->setLanguage('Japanese');
// echo $human_base->getLanguage();
// $human_base2 = new Human;
// $human_base->setLanguage('English');
// echo $human_base->getLanguage();
// $human_base3 = new Human;
// $human_base->setLanguage('Korea');
// echo $human_base->getLanguage();

// $count = Human :: $human_count;
// echo $count;

// // 66
// // 65の続き、
// // Humanクラスのインスタンス変数に$first_name, $last_name, $ageを追加し、アクセサメソッドも追加しなさい
// // カプセル化を想定した記述方法とすること
// // 実装後、2名分のインスタンス生成、データ設定、データ出力を実行すること
// class HumanBase {
//     public static $human_count = 0;
//     private $language;

//     public function __construct(){
//         self :: $human_count ++;
//     }

//     public function getLanguage(){
//         return sprintf("%sを使えます。\n", $this->language);
//     }
//     public function setLanguage($updateLanguage){
//         $this->language = $updateLanguage;
//     }
// }

// class Human extends HumanBase {
//     private $first_name;
//     private $last_name;
//     private $age;

//     public function getFirst_name(){
//         return sprintf("%s\n", $this->first_name);
//     }
//     public function setFirst_name($updateFirst_name){
//         $this->first_name = $updateFirst_name;
//     }   

//     public function getLast_name(){
//         return sprintf("%s\n", $this->last_name);
//     }
//     public function setLast_name($updateLast_name){
//         $this->last_name = $updateLast_name;
//     }    

//     public function getAge(){
//         return sprintf("%s\n", $this->age);
//     }
//     public function setAge($updateAge){
//         $this->age = $updateAge;
//     }
// }

// $human = new Human;
// $human -> setLanguage('Japanese');
// $human -> setFirst_name('Tanaka');
// $human -> setLast_name('Masashi');
// $human -> setAge('19');
// echo $human->getLanguage();
// echo $human->getFirst_name();
// echo $human->getLast_name();
// echo $human->getAge();

// $count = Human :: $human_count;
// echo $count;



// // 67
// // 68の続き、
// // Humanクラスのメソッドに"$first_name-$last_name"の形式で値を取得できるgetFullNameメソッドを追加し、表示させなさい

// class HumanBase {
//     public static $human_count = 0;
//     private $language;

//     public function __construct(){
//         self :: $human_count ++;
//     }

//     public function getLanguage(){
//         return sprintf("%sを使えます。\n", $this->language);
//     }
//     public function setLanguage($updateLanguage){
//         $this->language = $updateLanguage;
//     }
// }

// class Human extends HumanBase {
//     private $first_name;
//     private $last_name;
//     private $age;

//     public function getFirst_name(){
//         return sprintf("%s\n", $this->first_name);
//     }
//     public function setFirst_name($updateFirst_name){
//         $this->first_name = $updateFirst_name;
//     }   

//     public function getLast_name(){
//         return sprintf("%s\n", $this->last_name);
//     }
//     public function setLast_name($updateLast_name){
//         $this->last_name = $updateLast_name;
//     }    

//     public function getAge(){
//         return sprintf("%s\n", $this->age);
//     }
//     public function setAge($updateAge){
//         $this->age = $updateAge;
//     }

//     public function getFullName(){
//         return sprintf("%s-%s\n", $this->first_name, $this->last_name);
//     }
// }

// $human = new Human;
// $human -> setLanguage('Japanese');
// $human -> setFirst_name('Tanaka');
// $human -> setLast_name('Masashi');
// $human -> setAge('19');
// echo $human->getLanguage();
// echo $human->getFirst_name();
// echo $human->getLast_name();
// echo $human->getAge();
// echo $human->getFullName();

// $count = Human :: $human_count;
// echo $count;



// // 68
// // 67の続き、
// // 仕様変更により、$middle_nameの考慮が必要になった
// // Humanクラスに$middle_nameを追加し、必要な修正を加えなさい
// // なお、フルネームの形式は"$first_name-$middle_name-$last_name"とするが、
// // $middle_nameが無い場合は変更前の"$first_name-$last_name"の形式で出力する
// // 実装後、生成している2名の内1名だけ$middle_nameを設定せよ


// class HumanBase {
//     public static $human_count = 0;
//     private $language;

//     public function __construct(){
//         self :: $human_count ++;
//     }

//     public function getLanguage(){
//         return sprintf("%sを使えます。\n", $this->language);
//     }
//     public function setLanguage($updateLanguage){
//         $this->language = $updateLanguage;
//     }
// }

// class Human extends HumanBase {
//     private $first_name;
//     private $last_name;
//     private $age;

//     public function getFirst_name(){
//         return sprintf("%s\n", $this->first_name);
//     }
//     public function setFirst_name($updateFirst_name){
//         $this->first_name = $updateFirst_name;
//     }

//     public function getMiddle_name(){
//         return sprintf("%s\n", $this->middle_name);
//     }
//     public function setMiddle_name($updateMiddle_name){
//         $this->middle_name = $updateMiddle_name;
//     }   

//     public function getLast_name(){
//         return sprintf("%s\n", $this->last_name);
//     }
//     public function setLast_name($updateLast_name){
//         $this->last_name = $updateLast_name;
//     }    

//     public function getAge(){
//         return sprintf("%s\n", $this->age);
//     }
//     public function setAge($updateAge){
//         $this->age = $updateAge;
//     }

//     public function getFullName(){
//         if(empty($this->middle_name)){
//             return sprintf("%s-%s\n", $this->first_name, $this->last_name);
//         }
//         return sprintf("%s-%s-%s\n", $this->first_name, $this->middle_name, $this->last_name);
//     }
// }

// $tanaka = new Human;
// $tanaka -> setLanguage('Japanese');
// $tanaka -> setFirst_name('Tanaka');
// $tanaka -> setLast_name('Masashi');
// $tanaka -> setAge('19');
// echo $tanaka->getLanguage();
// echo $tanaka->getFirst_name();
// echo $tanaka->getLast_name();
// echo $tanaka->getAge();
// echo $tanaka->getFullName();

// $tom = new Human;
// $tom -> setLanguage('English');
// $tom -> setFirst_name('Tom');
// $tom -> setMiddle_name('mac');
// $tom -> setLast_name('mash');
// $tom -> setAge('19');
// echo $tom->getLanguage();
// echo $tom->getFirst_name();
// echo $tom->getMiddle_name();
// echo $tom->getLast_name();
// echo $tom->getAge();
// echo $tom->getFullName();

// $count = Human :: $human_count;
// echo $count;


// ?>