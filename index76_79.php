<?php
// //76
// try catch
// 1- 10 までのランダムな数字を変数に代入してください。
// もし生成した数字が奇数なら例外を発生させ、
// 「奇数です」と例外メッセージを出力してください。
​
$randNum = mt_rand(1,10);

function judgeEven($num){
    if($num%2 !== 0){
        throw new Exception('奇数は対象外です。');
    }
    return $num;
}

try {
    echo judgeEven($randNum);
} catch(Exception $e) {
    echo 'エラー'."\n", $e->getMessage(),"\n", $e->getTraceAsString();
}
​
// //77
// 例外が発生するしないに限らず、「例外処理を終了します」と出力するように実装してください。(finallyを利用して
​
$randNum = mt_rand(1,10);
​
function judgeEven($num){
    if($num%2 !== 0){
        throw new Exception('奇数は対象外です。');
    }
    return $num;
}
​
try {
    echo judgeEven($randNum);
} catch(Exception $e) {
    echo 'エラー'."\n", $e->getMessage(),"\n";
}finally{
    echo "例外処理を終了します";
}
​
// //78
// exceptionクラスを継承した独自の例外クラスを宣言してください。
// 独自の例外クラスを使用して、エラーメッセージを出力してください。
​
class OriginalException extends Exception {}
​
$randNum = mt_rand(1,10);
​
function judgeEven($num){
    if($num%2 !== 0){
        throw new OriginalException('奇数は対象外です。');
    }
    return $num;
}
​
try {
    echo judgeEven($randNum)."\n";
} catch(OriginalException $e) {
    echo 'エラー'."\n", $e->getMessage()."\n";
}finally{
    echo "例外処理を終了します"."\n";
}
​
​
// //79
// コマンドラインからphpファイル実行時、環境に合わせて出力内容を変えたい。
// 主な環境は、dev, stg, master の3つとする。
// コマンドラインに入力した環境変数を取得し、その環境変数を出力するような処理を書いてください。
// なお、実行コマンドは下記の通りとする。
// ex) ENV=stg php index.php
// （stg環境でindex.phpファイルを実行するといいう意味）
// #出力
// stg
​
echo $_ENV["ENV"]."\n";
​
?>
