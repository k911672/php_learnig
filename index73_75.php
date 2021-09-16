<?php
// //73
// 72の続き
// 出力するCSVファイルの1行目に出力項目をわかりやすいように追加したい。
// １行目に「name,price,stock」が表示されるように72のソースを改修してください。
// ex)
// name,price,stock
// apple,100, 345
// banana,200,247
// orange,300,987
// 出力するCSVのファイル名を現在時刻にしてください。
// ex)
// 201904041609.csv
​
// フルーツの詳細の追加
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
    $lines = implode(',' , $fruitsInfo);
    fwrite($fp_write , $lines. "\n");
}
​
fclose($fp_write);
fclose($fp_read);
​
if(file_exists($input_file)){
    unlink($input_file);
    rename($output_file, $input_file);
}
​
//項目名の追加
$add_fileTitle = "./csv/dev/fruits/".date("Ymd").".csv";
​
$fp_add = fopen($add_fileTitle, "w");
$fruitsTitle = array("name", "price", "stoc");
$titleLine = implode(',' , $fruitsTitle);
fwrite($fp_add , $titleLine."\n");
$fileContents = file_get_contents($input_file);
fwrite($fp_add, $fileContents);
​
fclose($fp_add);
​
if(file_exists($input_file)){
    unlink($input_file);
}
​
// //74
// 1-100までのidにそれぞれユニークなIDを紐つけたCSVファイルを出力したい。
// ユニークIDの仕様は、ランダムな数字6桁 + 一意なID13桁とする（計19桁）下記パスに出力してください。
// ./csv/dev/unique/
// 出力するファイル名はuniqueId.csvとする。
// ex)
// id, uniqueId
// 1,1057225cd930000d762
// 2,9561415cd930000d785
// ~
​
$unique_file = "./csv/dev/unique/uniqueNumFile.csv";
​
$filename = basename($unique_file);
$dir = dirname($unique_file);
​
if(!file_exists($input_file)){
    mkdir($dir, 0700, true);
}
​
$op_unique_file = fopen($unique_file, "w");
$id = 1;
​
while ($id <= 100) {
    $uniqueId = array($id, uniqid(mt_rand(0,999999), false));
    $uniqueIds = implode(',' , $uniqueId);
    fwrite($op_unique_file, $uniqueIds."\n");
    $id++;
}
​
fclose($op_unique_file);
​
​
// //75　ファイル分割
// 74の続き
// 74で出力したcsvファイルを読みこんで、
// 10個のファイルに分割して出力してください。
// なお、分割ファイルのファイル名は、それぞれuniqueId_1.php ~ のように連番とすること
​
​
​
// echo uniqid(rand(0,999999), false);
​
//問74の記述
$unique_file = "./csv/dev/unique/uniqueNumFile.csv";
​
$filename = basename($unique_file);
$dir = dirname($unique_file);
​
if(!file_exists($input_file)){
    mkdir($dir, 0700, true);
}
​
$op_unique_file = fopen($unique_file, "w");
$id = 1;
​
while ($id <= 100) {
    $uniqueId = array($id, uniqid(mt_rand(0,999999), false));
    $uniqueIds = implode(',' , $uniqueId);
    fwrite($op_unique_file, $uniqueIds."\n");
    $id++;
}
​
fclose($op_unique_file);
​
//ファイルの分割
$read_unique_file = fopen($unique_file, "r");
$fileNum = 0;
​
while (!feof($read_unique_file)) {
    $rowCount = 0;
    $div_file = "./csv/dev/unique/uniqueNumFile"."${fileNum}".".csv";
    $write_unique_file = fopen($div_file, "w");
​
    while ($rowCount < 10){
        $line = fgets($read_unique_file);
        fwrite($write_unique_file, $line);
        $rowCount++;
    }
    fclose($write_unique_file);
    $fileNum++;
}
​
fclose($read_unique_file);
​

?>
