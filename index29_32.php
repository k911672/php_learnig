<?php

// 29,
// 5個のString(文字列)の配列を用意し適当な文字を代入してください。
// その2番目の値を出力してください。
$fruits = ["リンゴ", "ミカン", "バナナ", "パイナップル", "ブドウ"];

$fruits[] = "スイカ";
echo $fruits[1]."\n";

// 30,
// 10個のInteger(整数)の配列を用意し適当な値を代入してください。
// 添字が偶数番目の合計値と添字が奇数番目の合計値を出力してください。

//for文
$even = 0;
$odd = 0;

for($i = 0; $i < count($nums); $i++){
    if($i % 2 === 0){
        $even += $nums[$i];
    }
    if($i % 2 !== 0){
        $odd += $nums[$i];
    }
}
echo $even."\n";
echo $odd."\n";

// foreach文
$even = 0;
$odd = 0;

$sum;
foreach($nums as $i => $num){
    if($i % 2 === 0){
        $even += $num;
    }
    if($i % 2 !== 0){
        $odd += $num;
    }
}
echo $even."\n";
echo $odd."\n";

// 31,
// Integer(整数)の配列を渡すと、配列の中身が３乗される関数を作ってください。
// なお、関数の中で引数に必要だと思うvalidationも作成してください。（validationの意味がわからない場合は、お調べください）

$nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

function check($nums) {
    if(!is_array($nums)) {
        echo "配列ではありません\n";
        return false;
    }
    if(empty($nums)){
        echo "配列の中身がありません\n";
        return false;
    }
    for($i = 0; $i < count($nums); $i++){
        if(!is_numeric($nums[$i])){
            echo "配列の中身が数値になっていません\n";
            return false;
        }
    }
    return true;
}

function cubed($nums) {
    if(!check($nums)){
        // return check($nums);
        return;
    }

    for($i = 0; $i < count($nums); $i++){
        $cubed[] = $nums[$i] ** 3;
    }

    return $cubed;
};

$result = cubed($nums);
var_dump($result);

//array_mapを使ったもの
$nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

function check($nums) {
    if(!is_array($nums)) {
        echo "配列ではありません\n";
        return false;
    }
    if(empty($nums)){
        echo "配列の中身がありません\n";
        return false;
    }
    for($i = 0; $i < count($nums); $i++){
        if(!is_numeric($nums[$i])){
            echo "配列の中身が数値になっていません\n";
            return false;
        }
    }
    return true;
}

function cubed($nums){
    return $nums ** 3;
}
$nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$cubed = array_map('cubed', $nums);
var_dump($cubed);


// 32,
// 2つのInteger(整数)の配列を引数にもち、それぞれ同じ順番の値が合計された配列を作る関数を作ってください(配列を返り値として持つ)
// 作られる配列は２つの入力された配列のうち少ない個数の配列の個数とします。

$odd = [1, 3, 5, 7];
$even = [2, 4, 6, 8, 10];

function sum($odd, $even) {
    $len = $even;
    if(count($even) > count($odd)){
        $len = $odd;
    }

    for($i = 0; $i < count($len); $i++){
        $sum[] = $odd[$i] + $even[$i];
    }
    var_dump($sum);
}

sum($odd, $even);

?>
