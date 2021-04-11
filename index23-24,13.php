<?php
// 23.
// int型とboolean型を渡し boolean型がtrueなら　int型を1プラスする　falseなら1マイナスする関数を作成してください
// function countInt($bool, $int) {
//     if($bool){
//         $int++;
//     } else {
//         $int--;
//     }
//     echo $int;
// }
// countInt(false, 1);
////↓訂正箇所:変数名

// function countInt($bool, $num) {
//     if($bool){
//         $num++;
//     } else {
//         $num--;
//     }
//     echo $num."\n";
// }
// countInt(false, 1);


// 24.
// int型とString型を渡しそのint型の数値の回数分　型の内容Stringを出力する関数を作成してください
// (int型が0以下の場合　「範囲外の入力値です」と出力してください
// function countStr($int, $str) {
//     echo str_repeat($str."\n", $int);
// }
//↓訂正箇所:条件の追加,returnでのバリデーションの追加

// function countStr($num, $str) {
//     if($num <= 0) {
//         echo '入力の範囲外です';
//         return;
//     }
//     echo str_repeat($str."\n", $num);
// }

// countStr(-1, "こんにちは");


// ★★★★★★★★★★★★★★★
// せっかくですので、ここで追加問題といきますね。再帰関数の問題です。
// 設問13ですが、現状では２つの変数が固定値となっていますので、これをランダムな数字が代入された２つの値を返すような関数を作成してみましょう。
// また２つの変数の差がマイナスになる場合は、再度、同じ関数を呼び、再代入するような関数を作成してみてください。
// 13. 条件式
// 整数型の２つの変数を宣言してください。
// 上記で宣言した２つの変数の内、1つ目を2つ目で引いた数字が偶数、奇数、0で「偶数です」「奇数です」「0です」と表示させるような条件式を書いてください。
// よろしければ、トライしてみてください＾＾
// ★★★★★★★★★★★★★★★

// function cal($num1, $num2) {
//     if ($num1 >= $num2){
//         return $num1 - $num2;
//     } else {
//         return cal(mt_rand(), mt_rand());
//     }
// }

// $diff = cal(mt_rand(), mt_rand());
// // $diff = cal(2,2);

// if($diff === 0){
//     echo "0です";
// } elseif($diff % 2 === 0) {
//     echo "偶数です";
// } else {
//     echo "奇数です";
// };

// echo $diff."\n";
// ↓
// せっかくなので、
// 関数の書き方を少し変えてみましょうか
// 関数の返り値は、差を返すのではなく、
// ２つの乱数を返すようにしてみたいです
// 関数名も、動詞を意識して、もう少し明確に命名してみたいです
// イメージとしては
// function createRandNums() {
//     //$num1 乱数生成
//     //$num2 乱数生成
//     //もし$num2のほうが大きかったら
//         //再帰処理
//     //$num1 と$ num2 を返す
// }
// ですかね
// こちらの方法でも処理を書いてみてください＾＾
// ↓


// function createRandNums() {
//     [$num1, $num2] = [mt_rand(), mt_rand()];
    
//     if ($num1 < $num2){
//         // [$num1, $num2] = [mt_rand(), mt_rand()];
//         createRandNums();
//     } else {
//         return [$num1, $num2];
//     }
// }

// [$num1, $num2] = createRandNums();
// $diff = $num1 - $num2;
// echo $diff."\n";

// if($diff === 0){
//     echo "0です";
// } elseif($diff % 2 === 0) {
//     echo "偶数です";
// } else {
//     echo "奇数です";
// };
//↓訂正個所：再起関数のreturn,list関数の追加
// function createRandNums() {
//     [$num1, $num2] = [mt_rand(), mt_rand()];
    
//     if ($num1 < $num2){
//         createRandNums();
//     } else {
//         return [$num1, $num2];
//     }
// }

// list($num1, $num2) = createRandNums();
// $diff = $num1 - $num2;
// echo $diff."\n";

// if($diff === 0){
//     echo "0です";
// } elseif($diff % 2 === 0) {
//     echo "偶数です";
// } else {
//     echo "奇数です";
// };
//↓訂正個所：再起関数のreturnの追加


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