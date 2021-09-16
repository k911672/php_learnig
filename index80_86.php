<?php 
// //80
// 環境変数に従って、下記パスにcsvファイルを出力するようにしてください。
// もしディレクトリが存在しない場合は、再帰的に作成するような処理を書くこと。
// ｀｀｀./csv/{環境変数}/ファイル名｀｀｀

$evn_fp = "./csv/".$_ENV["ENV"]."/ENV.csv";
$evn_dir = dirname($evn_fp);

if(!file_exists($evn_fp)){
    mkdir($evn_dir, 0700, true);
    touch($evn_fp);
}

echo $_ENV["ENV"]."\n";

// //81
// ｀｀｀http://localhost:1234｀｀｀
// こちらのURLにアクセスできるようなビルトインウェブサーバーのコマンドを書いてください。

php -S localhost:1234


// //82
// 下記パスのファイル名のみを取得し、出力してください。
// "/app/doc/test/sample/dev/test.php"
// 期待値
// test.php

$test_fp = "/app/doc/test/sample/dev/test.php";
$test_filename = basename($test_fp);

echo $test_filename."\n";

// //83
// 下記パスのディレクトリのパスのみを取得し、出力してください。
// "/app/doc/test/sample/dev/test.php"
// 期待値
// /app/doc/test/sample/dev

$test_fp = "/app/doc/test/sample/dev/test.php";
$test_dir = dirname($test_fp);

echo $test_dir."\n";

// //84
// $array = array(
//             "a" => 1,
//             "b" => 2,
//         );
// 上記の配列をjson化して出力してください。
// またjson化したものをデコードしてください。

$array = array(
            "a" => 1,
            "b" => 2,
        );

$jsonArray = json_encode($array);
echo $jsonArray;
$decodeArray = json_decode($jsonArray);
var_dump($decodeArray);

// //85
// eyJtZXNzYWdlIjoiQ29uZ3JhdHVsYXRpb25zISJ9
// 上記は、base64でエンコードされた文字列です。
// base64でデコードし、さらにjsonをデコードされた内容をvar_dump()で出力してください。

$text = 'eyJtZXNzYWdlIjoiQ29uZ3JhdHVsYXRpb25zISJ9';
$decodeText = base64_decode($text);
var_dump($decodeText);

// //86
// "Hello World"をhash化して、出力してください。

$hello = "Hello World";
var_dump( hash( "sha256", $hello));





?>