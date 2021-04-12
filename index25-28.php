<?php

// 25,
// 配列を宣言してください
// Integer(整数) 1個の配列　
// String(文字列) 3個の配列
// $ints = [1];
// $strs = ["リンゴ", "バナナ", "ミカン"];
//↓訂正個所：変数名

$nums = [1];
$fruits = ["リンゴ", "バナナ", "ミカン"];



// // 26,
// // 配列は初期化の際に初めから配列の値の代入までまとめて行う事ができます。
// // Integer(整数)　3個の配列で　　1,2,3という数字を値に持たせたい。
// // 宣言、要素の確保ののちそれぞれに代入する配列の用意の仕方と
// // 代入までまとめて行う書き方で用意する仕方にて配列を用意してください

//配列のインデックスを指定して代入する方法
// $ints2 = [1];
// $ints2[1] = 2;
// $ints2[2] = 3;
// var_dump($int2);
//↓訂正個所：変数名、配列への代入方法
$nums = [1];
$nums[] = 2;
$nums[] = 3;
// var_dump($nums);

//array_pushを使用する代入方法
// $ints3 = [1];
// array_push($ints3, 2, 3);
// var_dump($int3);


// 27,
// 26の続き、
// 用意した配列をfor文を使って値を出力してください。
// foreach文を使った値の出力をしてください。

// //for文
// for($i = 0; $i < 3; $i++){
//     echo $ints3[$i]."\n";
// }

// //foreach文
// foreach ($ints3 as $int) {
//     echo $int."\n";
// }


// 28,
// 27の続き、
// 値を出力したあとにそれぞれの値の２乗の値を代入し直すよう修正してください。
// foreach ($ints3 as $int) {
//     echo ($int ** 2)."\n";
// }
//↓訂正個所：配列にし直す処理と、for文の追加
//foreach文
$squares = [];

foreach ($nums as $num) {
    $squares[] = $num ** 2;
}

var_dump($squares);

//for文
$squares = [];
for($i = 0; $i < 3; $i++){
    $squares[] = $nums[$i] **2;
}

var_dump($squares);

?>