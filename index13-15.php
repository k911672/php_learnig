<?php

// 13. 条件式
// 整数型の２つの変数を宣言してください。
// 上記で宣言した２つの変数の内、1つ目を2つ目で引いた数字が偶数、奇数、0で「偶数です」「奇数です」「0です」と表示させるような条件式を書いてください。

$num1 = 128;
$num2 = 123;
$minus = $num1 - $num2;

if($minus === 0){
    echo "0です";
} elseif($minus % 2 === 0) {
    echo "偶数です";
} else {
    echo "奇数です";
};

// 14. FizzBuzz
// 1 ~ 100の数字をfor文でループしてください。
// ただし3の倍数のときは数の代わりに｢Fizz｣と、5の倍数のときは｢Buzz｣、3と5両方の倍数の場合には｢FizzBuzz｣と出力すること。

for($i = 0; $i <= 100; $i++){
    if($i % 3 === 0 && $i % 5 === 0){
        echo "FizzBuzz\n";
    } elseif($i % 3 === 0) {
        echo "Fizz\n";
    } elseif($i % 5 === 0) {
        echo "Buzz\n";
    } else {
        echo $i."\n";
    }
};


// 15. switch文
// 整数型の２つの変数を宣言してください。
// 上記で宣言した２つの変数の内、1つ目を2つ目で引いた数字が偶数、奇数、0で「偶数です」「奇数です」「0です」と表示させるような条件式を書いてください。

$num1 = 128;
$num2 = 123;
$minus = $num1 - $num2;

switch ($minus) {
    case 0:
        echo "0です";
        break;
    case $minus % 2 === 0:
        echo "偶数です";
        break;
    default:
        echo "奇数です";
        break;
};

?>
