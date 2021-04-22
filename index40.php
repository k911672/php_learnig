<?php
// 40 じゃんけんを作成しよう！
// 下記の要件を満たす「じゃんけんプログラム」を開発してください。
// 要件定義
// ・使用可能な手はグー、チョキ、パー
// ・勝ち負けは、通常のじゃんけん
// ・PHPファイルの実行はコマンドラインから。
// ご自身が自由に設計して、プログラムを書いてみましょう！
// $hands = [ "パー", "グー", "チョキ"] ;
// //じゃんけんの手
// function myHand($hands){
//     echo "じゃんけんぽん！（パー,グー,チョキのどれかを出してください）\n";
//     $myHand = trim(fgets(STDIN));
//     if(!in_array($myHand, $hands, true)){
//         echo "パー,グー,チョキのどれかしか選べません\n";
//         return myHand($hands);
//     }   
//     return $myHand;
// }
// //相手の処理
// function rivalHand($hands){
// $rivalHand = $hands[array_rand( $hands )] ;
//     return $rivalHand;
// }
// //負けの処理
// function lose($myHand, $rivalHand){
//     if($myHand === "グー" && $rivalHand === "パー" ){
//         echo "あなた：".$myHand." 相手：".$rivalHand."\n YOU'RE LOSER!";
//         return false;
//     } 
//     if($myHand === "パー" && $rivalHand === "チョキ" ){
//         echo "あなた：".$myHand." 相手：".$rivalHand."\n YOU'RE LOSER!";
//         return false;
//     } 
//     if($myHand === "チョキ" && $rivalHand === "グー" ){
//         echo "あなた：".$myHand." 相手：".$rivalHand."\n YOU'RE LOSER!";
//         return false;
//     } 
//     return true;
// }
// //引き分けの処理
// function draw($myHand, $rivalHand){
//     if($myHand === $rivalHand ){
//         echo "あなた：".$myHand." 相手：".$rivalHand."\n DRAW!";
//         return false;
//     } 
//     return true;
// }
// function judge($hands){
//     $myHand = myHand($hands);
//     $rivalHand = rivalHand($hands);

//     if(lose($myHand, $rivalHand)){
//         if(draw($myHand, $rivalHand)){
//             echo "あなた：".$myHand." 相手：".$rivalHand."\nYOU'RE WINNER";
//             return;
//         }
//     }
// }
// judge($hands);
//訂正箇所：複数あるのでかきにまとめる。
//①関数のリファクタリング
//⇨judge関数でじゃんけんの判定
//⇨show関数でじゃんけんの結果の表示
//②関数名の訂正
//⇨動詞を意識する。
//③じゃけんロジックの参照
//⇨Qiita参照
//④じゃんけんの手を定数で宣言する
//⇨例) STONE => 'じゃんけん'
//⑤じゃんけんが終わったら続けるかどうかを聞くようにする
// //じゃんけんの手の種類
// const STONE = 0;
// const SCISSORS = 1;
// const PAPER = 2;
// const HANDS_TYPE = [ 
//     STONE => "グー", 
//     SCISSORS => "チョキ",
//     PAPER => "パー"
// ];
// //自分の手
// function getMyHand($hands){
//     $myHand = trim(fgets(STDIN));
//     if(!array_key_exists($myHand, $hands)){
//         echo "0,1,2のどれかしか選べません\n";
//         return getMyHand($hands);
//     }   
//     return $myHand;
// }
// //相手の手
// function getRivalHand($hands){
// $rivalHand = array_rand($hands);
//     return $rivalHand;
// }
// //判定の関数
// function judgeResult($hands){
//     echo "じゃんけんぽん！（0(STONE),1(SCISSORS),2(PAPER)のどれかを出してください）\n";
//     $myHand = getMyHand($hands);
//     $rivalHand = getRivalHand($hands);
//     $col = ($myHand - $rivalHand + 3) % 3;
//     return [$col, $myHand, $rivalHand];
// }
// //リスタートの関数
// function startAgain($hands) {
//     echo "ゲームをもう一度しますか？\n 1(Yes) or 2(No)\n";
//     $mySelect = trim(fgets(STDIN));
//     if($mySelect !== "1" && $mySelect !== "2"){
//         echo "1か2を選んでください\n";
//         return startAgain($hands);
//     }
//     if($mySelect === "2"){
//         echo "SEE YOU AGAIN";
//         return;
//     }
//     return showResult($hands);
// }
// //結果を表示する関数
// function showResult($hands){
//     $result = judgeResult($hands);
    
//     $judge = [
//         0 => 'DRAW',
//         1 => 'LOSE',
//         2 => 'WIN'
//     ];
//     echo "あなたは".$hands[$result[1]]."を出しました。\n";
//     echo "相手は".$hands[$result[2]]."を出しました。\n";
//     echo "YOUR".$judge[$result[0]]."\n";
//     startAgain($hands);
// }
// showResult(HANDS_TYPE);
//訂正箇所2：複数あるのでかきにまとめる。
//①関数内での定数の扱いについて　OK
//②$judgeの定数化　OK
//③$colの関数化　OK
//④関数の構成について
//⑤if文内の処理の定数化
//⑥再起関数の仕方について

// //じゃんけんの手の種類
// const STONE = 0;
// const SCISSORS = 1;
// const PAPER = 2;
// const HANDS_TYPE = [ 
//     STONE => "グー", 
//     SCISSORS => "チョキ",
//     PAPER => "パー"
// ];
// //判定の種類
// const JUDGE_TYPE = [
//     0 => 'DRAW',
//     1 => 'LOSE',
//     2 => 'WIN'
// ];
// //自分の手
// function getMyHand(){
//     $myHand = trim(fgets(STDIN));
//     if(!array_key_exists($myHand, HANDS_TYPE)){
//         echo "0,1,2のどれかしか選べません\n";
//         return getMyHand(HANDS_TYPE);
//     }   
//     return $myHand;
// }
// //相手の手
// function getRivalHand(){
//     $rivalHand = array_rand(HANDS_TYPE);
//     return $rivalHand;
// }
// //じゃんけんの結果の数値化
// function getJudgeNum($myHand, $rivalHand){
//     $result = ($myHand - $rivalHand + 3) % 3;
//     return [$myHand, $rivalHand, $result];
// }
// //リスタートの関数
// function startAgain() {
//     echo "ゲームをもう一度しますか？\n 1(Yes) or 2(No)\n";
//     $mySelect = trim(fgets(STDIN));
//     if($mySelect !== "1" && $mySelect !== "2"){
//         echo "1か2を選んでください\n";
//         return startAgain();
//     }
//     if($mySelect === "2"){
//         echo "SEE YOU AGAIN";
//         return;
//     }
//     return true;
// }
// //結果を表示する関数
// function showResult($result){
//     echo "あなたは".HANDS_TYPE[$result[0]]."を出しました。\n";
//     echo "相手は".HANDS_TYPE[$result[1]]."を出しました。\n";
//     echo "YOU ".JUDGE_TYPE[$result[2]]."\n";
// }
// //全ての処理のまとめ
// function main(){
//     echo "じゃんけんぽん！（0(STONE),1(SCISSORS),2(PAPER)のどれかを出してください）\n";
//     $myHand = getMyHand();
//     $rivalHand = getRivalHand();
//     $result = getJudgeNum($myHand, $rivalHand);
//     showResult($result);
//     $restartGame = startAgain();
//     if($restartGame) {
//         main();
//     }
// }
// main();
//
//訂正箇所3：複数あるので下記にまとめる。
// ①無理に配列になっているところの修正 => OK
// ②関数名（getJudgeNum）の修正 => OK
// ③$mySelectの選択肢の定数化 => OK
// ④再起関数の処理の書き方の間違い => OK

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