<?php
// 37,三項演算子
// Integer(整数)の変数を2つ、String(文字列)の変数を1つ宣言してください。
// 2つのint型変数の合計が100未満なら「100未満」、そうじゃなければ「100以上」とString(文字列)に三項演算子(条件演算子)を使って代入して、出力してください。
$num1 = 55;
$num2 = 88;
$result = "100未満";

($num1 + $num2) < 100 ? $result : $result = "100以上";
echo $result."\n";

// 38,文字列検索
// string型の変数を２つ宣言してください。
// 第二引数のString(文字列)が第一引数に含まれているかどうかのboolean型を返す関数を作成してください。

$address = "naoki.kimua@gmail.com";
$mailCheck = "@";

function boolCheck($address, $mailCheck){
    $result = strpos($address, $mailCheck);
    if(!$result){
        return false;
    }
    return true;
}

echo $bool = boolCheck($address, $mailCheck);


// 39, 標準入力
// PHPファイルはコマンドラインから実行してください。
// 仕様
// 「あなたの名前を教えてください。」出力
// ↓
// 入力 ex) Micael
// ↓
// 「Micaelさん、あなたの年齢は何歳ですか？」出力
// ↓
// 入力 ex) 20
// ↓
// 「Micaelさん（年齢:20）、ご登録ありがとうございます！」出力
// ↓
// プログラム終了
// echo "あなたの名前をおしえてください\n";
// $name = fgets(STDIN);
// echo "${name}さん、あなたの年齢は何歳ですか？\n ";
// $age = fgets(STDIN);
// echo "${name}さん（年齢:${age}）、ご登録ありがとうございます！\n";
//訂正箇所：機能ごとに関数にすること、下記バリエーションの追加
// [追加するバリエーション]
// 名前
// ・空でないこと
// ・10文字以内
// 年齢
// ・空でないこと
// ・数字であること

//名前入力のバリデーション
function nameCheck($name){
    if(empty($name)){
        echo "名前を入力してください";
        return false;
    }
    if(mb_strlen($name) > 10){
        echo "文字数がオーバーしております";
        return false;
    }
    return true;
}

//年齢入力のバリデーション
function ageCheck($age){
    if(empty($age)){
        echo "年齢を入力してください";
        return false;
    }
    if(!is_numeric($age)){
        echo "数値を入力してください";
        return false;
    }
    return true;
}

//入力の関数
function input($type){
    $input = trim(fgets(STDIN));
    if($type === 'name'){
        $check = nameCheck($input);
    }
    if($type === 'age'){
        $check = ageCheck($input);
    }
    if(!$check){
        return input($type);
    }
    return $input;
}

//出力の関数
function output($name, $age){
    if (empty($name) && empty($age)) {
        echo "あなたの名前をおしえてください\n";
        return;
    }
    if (!empty($name) && empty($age)) {
        echo "${name}さん、あなたの年齢は何歳ですか？\n ";
        return;
    }
    if (!empty($name) && !empty($age)) {
        echo "${name}さん（年齢:${age}）、ご登録ありがとうございます！\n";
        return;
    }
}

//質問の関数
function quest($name, $age){
    output($name, $age);

    $name = input('name');
    output($name, $age);

    $age = input('age');
    output($name, $age);
}

quest($name, $age);


?>
