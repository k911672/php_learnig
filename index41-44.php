<?php

// 41
// $x = "abcaあいう"; と宣言する
// 「あいう」という文字のみを切り抜いて表示してください
$x = "abcaあいう";

echo mb_substr($x,4,7);
echo mb_substr($x, -3);

// 42
// 次の配列を宣言する
// $array1 = array('あ', 'い', 'う', 'え', 'お');
// 降順にソートして出力してください
// ex) おえういあ

$array1 = array('あ', 'い', 'う', 'え', 'お');

rsort($array1);

foreach ($array1 as $order) {
    echo $order;
}

// 43
// 42の機能を関数にしてください
$array1 = array('あ', 'い', 'う', 'え', 'お');

function descendOrder($array1) {
    rsort($array1);

    foreach ($array1 as $order) {
        echo $order;
    }
}

descendOrder($array1);


// 44 
// 次のソースコードの関数内を埋めて、2と表示されるソースコードを作成しなさい
// 元の処理の改変は行わないこと

$number = 1;
function add_number() {
    global $number;
    $number++;
}
add_number();
echo $number;

?>