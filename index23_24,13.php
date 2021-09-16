<?php
// 23.
// int型とboolean型を渡し boolean型がtrueなら　int型を1プラスする　falseなら1マイナスする関数を作成してください

function countInt($bool, $num) {
    if($bool){
        $num++;
    } else {
        $num--;
    }
    echo $num."\n";
}
countInt(false, 1);


// 24.
// int型とString型を渡しそのint型の数値の回数分　型の内容Stringを出力する関数を作成してください
// (int型が0以下の場合　「範囲外の入力値です」と出力してください

function countStr($num, $str) {
    if($num <= 0) {
        echo '入力の範囲外です';
        return;
    }
    echo str_repeat($str."\n", $num);
}

countStr(-1, "こんにちは");


// ★★★★★★★★★★★★★★★
// せっかくですので、ここで追加問題といきますね。再帰関数の問題です。
// 設問13ですが、現状では２つの変数が固定値となっていますので、これをランダムな数字が代入された２つの値を返すような関数を作成してみましょう。
// また２つの変数の差がマイナスになる場合は、再度、同じ関数を呼び、再代入するような関数を作成してみてください。
// 13. 条件式
// 整数型の２つの変数を宣言してください。
// 上記で宣言した２つの変数の内、1つ目を2つ目で引いた数字が偶数、奇数、0で「偶数です」「奇数です」「0です」と表示させるような条件式を書いてください。
// よろしければ、トライしてみてください＾＾
// ★★★★★★★★★★★★★★★

function createRandNums() {
    [$num1, $num2] = [mt_rand(), mt_rand()];

    if ($num1 < $num2){
        return createRandNums();
    } else {
        return [$num1, $num2];
    }
}

list($num1, $num2) = createRandNums();
$diff = $num1 - $num2;
echo $diff."\n";

if($diff === 0){
    echo "0です";
} elseif($diff % 2 === 0) {
    echo "偶数です";
} else {
    echo "奇数です";
};

?>
