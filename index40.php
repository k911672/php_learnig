<?php
// 40 じゃんけんを作成しよう！
// 下記の要件を満たす「じゃんけんプログラム」を開発してください。
// 要件定義
// ・使用可能な手はグー、チョキ、パー
// ・勝ち負けは、通常のじゃんけん
// ・PHPファイルの実行はコマンドラインから。
// ご自身が自由に設計して、プログラムを書いてみましょう！

//じゃんけんの手の種類
const STONE = 0;
const SCISSORS = 1;
const PAPER = 2;

const HANDS_TYPE = [
    STONE => "グー",
    SCISSORS => "チョキ",
    PAPER => "パー"
];

//判定の種類
const JUDGE_TYPE = [
    0 => 'DRAW',
    1 => 'LOSE',
    2 => 'WIN'
];

//Yes or No
const YES = "1";
const NO = "2";

//自分の手
function getMyHand(){
    $myHand = trim(fgets(STDIN));
    if(!array_key_exists($myHand, HANDS_TYPE)){
        echo "0,1,2のどれかしか選べません\n";
        return getMyHand(HANDS_TYPE);
    }
    return $myHand;
}

//相手の手
function getRivalHand(){
    $rivalHand = array_rand(HANDS_TYPE);
    return $rivalHand;
}

//じゃんけんの結果の数値化
function judge($myHand, $rivalHand){
    $result = ($myHand - $rivalHand + 3) % 3;
    return $result;
}

//リスタートの関数
function startAgain() {
    echo "ゲームをもう一度しますか？\n 1(YES) or 2(NO)\n";
    $mySelect = trim(fgets(STDIN));
    if($mySelect !== YES && $mySelect !== NO){
        echo "1か2を選んでください\n";
        return startAgain();
    }
    if($mySelect === NO){
        echo "SEE YOU AGAIN";
        return;
    }
    return true;
}

//結果を表示する関数
function showResult($result, $myHand, $rivalHand){
    echo "あなたは".HANDS_TYPE[$myHand]."を出しました。\n";
    echo "相手は".HANDS_TYPE[$rivalHand]."を出しました。\n";
    echo "YOU ".JUDGE_TYPE[$result]."\n";
}

//全ての処理のまとめ
function main(){
    echo "じゃんけんぽん！（0(STONE),1(SCISSORS),2(PAPER)のどれかを出してください）\n";
    $myHand = getMyHand();
    $rivalHand = getRivalHand();
    $result = judge($myHand, $rivalHand);
    showResult($result, $myHand, $rivalHand);
    $restartGame = startAgain();
    if($restartGame) {
        return main();
    }
}

main();

?>
