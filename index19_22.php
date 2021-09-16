<?php

// 19, while文 do-while文
// 1000から2000までの間で1の桁が7の数字の最初の数字を求めて出力してください
// for文　while文　do-while文を使ってそれぞれ出力してください

for($i = 1000; $i < 2000; $i++){
    if($i % 10 === 7){
        echo $i."\n";
        break;
    };
};

$i = 1000;
while($i < 2000){
    $i++;
    if($i % 10 === 7){
        echo $i."\n";
        break;
    };
};

$i = 1000;
do {
    $i++;
    if($i % 10 === 7){
        echo $i."\n";
        break;
    };;
} while ($i < 2000);


// 20. 関数の基礎
// int型の変数を宣言してください。
// 変数を渡して二乗の整数を返す関数を作成してください

function squared ($num){
    return (int)($num ** 2);
};

// echo $int = squared(3.2);


// 21. 関数の基礎2
// boolean型を渡すと別のboolean型を返す関数を作成してください
// ex) trueを渡す→falseが返ってくる

function reverseBool ($bool){
    return !$bool;
};

echo $boo = reverseBool(false);


// 22.
// int型とString型の２つの変数を引数で渡すと 「int型:String型」という文字列を返す関数を作成してください
// ※int型,String型は引数で渡してください
// ex)出力例「 5: ああああ」
function int_Str ($int, $str){
    return "${int}: ${str}";
};
echo $result = int_Str(5, "ああああ");

//↓別解：sprintfを使おう！

function returnIntStr (){
    return '%d : %s';
};
echo $result = sprintf(returnIntStr(), 5, 'あああああ') ;



?>
