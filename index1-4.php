<?php
// 1. 基本的な変数の宣言
// 以下の指定された条件に合うような値を変数に代入して宣言してください。
// ・整数（int） $number: 5
// ・文字列（string） $text: test
// ・論理型（boolean） $flag: true
// ・null型 $test: null

$number = 5;
var_dump($number);

$text = 'test';
var_dump($text);

$flag = true;
var_dump($flag);

$test = null;
var_dump($test);



// 2. 基本的な計算
// 整数型の２つの変数を宣言してください。
// 2つの変数を用いて、　足す、引く、かける、割る、割った余りを出力してください。

// $a = 124;
// $b = 3;

// // $resolve = $a + $b;
// // echo $resolve;
// // $resolve = $a - $b;
// // echo $resolve;
// // $resolve = $a * $b;
// // echo $resolve;
// // $resolve = $a / $b;
// // echo $resolve;
// // $resolve = $a % $b;
// echo $resolve;

// ↓訂正箇所：変数名の変更と改行処理の追加
$odd = 13;
$even = 2;

$resolve = $odd + $even;
echo $resolve."\n";
$resolve = $odd - $even;
echo $resolve."\n";
$resolve = $odd * $even;
echo $resolve."\n";
$resolve = $odd / $even;
echo $resolve."\n";
$resolve = $odd % $even;
echo $resolve."\n";

// 3. 条件式とboolean(論理型)について
// 初期値がfalseである論理型の変数を宣言してください。
// 問題2で宣言した２つの変数を足した結果が偶数であれば、論理型の変数にtrueを代入してください。

// $boolean = false;
// var_dump($boolean);

// if(($a + $b)%2 === 0){
//   $boolean = true;
//   var_dump($boolean);
// };

// ↓訂正個所：変数名の変更、演算子のスペース追加

$bool = false;
var_dump($bool);

if(($odd + $even) % 2 === 0){
  $bool = true;
  var_dump($bool);
};


// 4. 条件式
// 設問3のboolean型の変数を利用した条件式を作成し、以下のように出力してください。
// ・偶数なら..... 「偶数です」
// ・奇数なら.....「奇数です」

// if(($a + $b)%2 === 0){
//   echo '偶数です';
// } else {
//   echo '奇数です';
// };


//↓訂正箇所：問３の$boolの活用、改行。
if($bool){
  echo '偶数です'."\n";
} else {
  echo '奇数です'."\n";
};


?>