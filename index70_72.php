<?php
​
// // //70 ファイル関数
// // 5つの果物の名前(string型)の要素をもつ配列を宣言してください。
// // カレントディレクトリに、配列の中身を１行ずつ記載したCSVファイルを出力してください。
// // CSVのファイル名はfruits.csvとします。ex)
// // $fruits = array("apple", "banana", "orange); なら
// // CSVファイルの中身は
// // apple
// // banana
// // orange
​
$fruits = array(
    "apple",
    "orange",
    "peach",
);
​
$filename = "fruits.csv";
$file_path = "./".$filename;
​
foreach($fruits as $fruit) {
    $csv = mb_convert_encoding($fruit, 'SJIS-win', 'UTF-8');
    $fp = fopen($file_path, "a");
    echo $fp;
    fwrite($fp, $csv."\n");
    fclose($fp);
}
​
​
​
// //71
// 70.の続き
// csvファイルの出力場所を下記パスに変更してください。
// ./csv/dev/fruits/
// その際に、上記パスのディレクトリが存在しない場合は、再帰的にディレクトリを作成する処理を追加してください。
​
$fruits = array(
    "apple",
    "orange",
    "peach",
);
​
$file = "./csv/dev/fruits/fruits.csv";
​
$filename = basename($file);
$dir = dirname($file);
​
if(!file_exists($file)){
    mkdir($dir, 0700, true);
    touch($file);
}
​
foreach($fruits as $fruit) {
    $csv = mb_convert_encoding($fruit, 'SJIS-win', 'UTF-8');
    $fp = fopen($file, "a");
    fwrite($fp, $csv."\n");
    fclose($fp);
}
​
​
​
// //72
// 71.の続き
// 71で出力したcsvファイルに、それぞれ金額と在庫数の項目を追加したい。
// 71で出力したcsvファイルを読み込んで、金額と在庫数の項目を追加してください。
// なお金額は、100,200,300のうちのどれか、在庫数は999個以下のランダムな数字とする。
// ex)
// apple,100, 345
// banana,200,247
// orange,300,987
​
​
$input_file = "./csv/dev/fruits/fruits.csv";
$output_file = "./csv/dev/fruits/fruitsDetail.csv";
​
$filename = basename($fp_read);
$dir = dirname($fp_read);
​
if(!file_exists($input_file)){
    mkdir($dir, 0700, true);
}
​
$fp_read = fopen($input_file , "r");
$fp_write = fopen($output_file, "w");
​
while ($line = fgets($fp_read)) {
    $fruitsInfo = array(trim($line), rand(1,3)*100, rand(0,999));
    var_dump($fruitsInfo);
    $lines = implode(',' , $fruitsInfo);
    fwrite($fp_write , $lines. "\n");
}
​
if(file_exists($input_file)){
    unlink($input_file);
    rename($output_file, $input_file);
}
​
fclose($fp_read);
fclose($fp_write);
​
​
?>
