<?php

// //90
// Q.商品マスター登録プログラムを作成したい
// 下記仕様をみたすプログラムを作成してください。
// メインメニュー
// 1, 商品一覧表示
// 2, 商品登録
// 3, 商品削除
// 4, 商品CSV出力
// 5, 終了
// ↓各機能の詳細は下記
// 1, 商品一覧表示
// 【表示項目】
// id
// 商品名
// JANコード
// 2, 商品マスター登録
// ・商品名 - 入力
// ・JANコード生成(自動)
// ※JANコード生成ルールは、9桁のランダムな数字 + ID３桁とする
// ex) id = 1 のアイテムなら
// 9桁のランダムな数字 + 001
// 3, 商品削除
// idを入力し、該当する商品を一覧から削除
// 4, 商品CSV出力
// 現在登録されている商品一覧をCSVで出力する
// パス：./csv/item_list_{現在時刻YmdHis}.csv
// ・項目　
// ID, 商品名, JANコード
// 5, 終了

// 修正点１：
// ① UserクラスのインスタンスをGoodsクラスのコンストラクタに渡されておりますがこちらは不要　OK
// ② ファイル変数の中身をコンストラクタにセット　OK
// ③ プロパティの宣言を上部に　OK
// ④ プロパティの宣言位置　OK？（質問）
// ⑤ var_dumpをechoに変更　OK
// ⑥ import機能の実装

require_once ("validation90/ContinueValidation.php");
require_once ("validation90/DeleteValidation.php");
require_once ("validation90/MenuValidation.php");
require_once ("validation90/PasswordValidation.php");
require_once ("validation90/RegisterValidation.php");
require_once ("validation90/UserIdValidation.php");

class User {
    public static $user_list = array (
        1 => array(
            "id" => "1",
            "password" => "1234",
            "name" => "tanaka",
        ),
        2 => array(
            "id" => "2",
            "password" => "3456",
            "name" => "suzuki",
            )
        ); 
}
    
class Goods {
    const MENU_REGISTER = 1;
    const MENU_DELETE = 2;
    const MENU_SHOW = 3;
    const MENU_IMPORT = 4;
    const MENU_FINISH = 5;
    
    public $user;
    public $titleFile;
    public $contents_file;
    public $registerId;
    
    const JUDGE_CONTINUE = [
        "1" => true,
        "2" => false
    ];

    //ログイン機能
    public function __construct() {
        $this->titleFile = "./csv/dev/goods/".date("Ymd")."title.csv";
        $this->contents_file = "./csv/dev/goods/".date("Ymd")."goods.csv";
        $this->login(User::$user_list);
    }

    public function login($users) {
        echo "IDを入力してください。\n";
        $inputId = trim(fgets(STDIN));

        $validation = new UserIdValidation;

        if(!$validation->check($inputId, $users)){
            $errors = $validation->getErrorMessages();
            $this->showErrorMessages($errors);
            return $this->login($users);
        }

        $userInfo = $users[$inputId];
        $this->user = $userInfo["name"];
        $userPassword = $userInfo["password"];
        echo "パスワードを入力お願いいたします。\n";
        $this->inputPassword($userPassword);
        echo $this->user."様、いらっしゃいませ。\n";
    }

        //パスワード入力
    public function inputPassword($userPassword){
        $inputPassword = trim(fgets(STDIN));

        $validation = new PasswordValidation;

        if(!$validation->check($inputPassword, $userPassword)){
            if(PasswordValidation::$count >= PasswordValidation::LIMIT){                
                $errors = $validation->getErrorMessages();
                $this->showErrorMessages($errors);
                exit;
            }
            $errors = $validation->getErrorMessages();
            $this->showErrorMessages($errors);
            return $this->inputPassword($userPassword);
        }
    }

    public function main(){
        $this->makeFile();
        $this->makeTitle();
        switch($this->selectMenu()){
            case self::MENU_REGISTER:
                $this->registerContents();
                break;
            case self::MENU_DELETE:
                $this->deleteContents();
                break;
            case self::MENU_SHOW:
                $this->showContents();
                break;
            case self::MENU_IMPORT:
                $this->importCSV();
                break;
            case self::MENU_FINISH:
                echo "ご利用ありがとうございました。\n";
                return;
            default:
                echo "入力した値が間違っております。\n";
                return $this->main();
        }
        if($this->isContinue()){
            return $this->main();
        };
    }

    //ファイルの作成
    public function makeFile(){
        $dir = dirname($this->titleFile);
        
        if(!file_exists($this->titleFile)){
            mkdir($dir, 0700, true);
            touch($this->titleFile);
        }
    }

    //項目名の追加
    public function makeTitle(){
        $fp_title = fopen($this->titleFile, "w");
        $goodsTitle = array("id", "商品名", "JANコード");
        $titleLine = implode(',' , $goodsTitle);
        fwrite($fp_title, $titleLine."\n");
        fclose($fp_title);
    }
    
    //メニューの選択
    public function selectMenu(){
        $validation = new MenuValidation;

        echo  "ご利用のメニューをお選びください。 1:登録商品の追加, 2:登録商品の削除, 3:登録商品の照会, 4:importディレクトリ内のファイルをインポート, 5:終了\n";
        $inputMenu = trim(fgets(STDIN));
        if (!$validation->check($inputMenu)){
            $errors = $validation->getErrorMessages();
            $this->showErrorMessages($errors);
            return $this->selectMenu();
        }
        return $inputMenu;
    }
    
    //商品マスター登録
    public function registerContents(){
        $validation = new RegisterValidation;

        $fp_contents = fopen($this->contents_file, "w");
        $id = 1;

        $fileTitle = file_get_contents($this->titleFile);
        fwrite($fp_contents, $fileTitle);
        
        echo "登録する商品数を入力下さい\n";
        $inputId = trim(fgets(STDIN));
        if(!$validation->checkId($inputId)){
            $errors = $validation->getErrorMessages();
            $this->showErrorMessages($errors);
            return $this->registerContents();
        }
        while ($id <= $inputId) {
            echo "商品名：";
            $goods = trim(fgets(STDIN));
            if(!$validation->checkGoodsName($goods)){
                $errors = $validation->getErrorMessages();
                $this->showErrorMessages($errors);
                return $this->registerContents();
            }
            $contents = array($id, $goods, uniqid(mt_rand(0,999999), false));
            $contentsLine = implode(',' , $contents);
            fwrite($fp_contents , $contentsLine."\n");
            $id++;
        }
        
        if(file_exists($this->titleFile)){
            unlink($this->titleFile);
        }
        fclose($fp_contents);
    }
    
    //商品削除
    public function deleteContents(){
        $validation = new DeleteValidation;
        $fp_read = fopen($this->contents_file, "r");
        while ($line = fgets($fp_read)) {
            $this->registerId[] = $line[0];
        }
        fclose($fp_read);

        echo "削除する項目のidを選んで下さい\n";
        $delete_contents = file($this->contents_file);
        $deleteId = trim(fgets(STDIN));
        if(!$validation->check($deleteId, $this->registerId)){
            $errors = $validation->getErrorMessages();
            $this->showErrorMessages($errors);
            return $this->deleteContents();
        }
        unset($delete_contents[$deleteId]);
        file_put_contents($this->contents_file, $delete_contents);
    }
    
    // // 登録商品一覧表示
    public function showContents(){
        $fp_read = fopen($this->contents_file, "r");
        while ($line = fgets($fp_read)) {
            // var_dump($line);
            echo $line;
        }
        fclose($fp_read);
    }

    //import機能の実装
    public function importCSV(){
        $path =  "./csv/dev/goods/import/";
        $fileDate = array();
        $files = scandir($path);
    
        foreach( $files as $importFile ) {
            $filePath = $path.$importFile ;
            $pathInfo = pathinfo($filePath, PATHINFO_EXTENSION);
            if($pathInfo === 'csv'){
                $fileDate[] = $filePath;
            }
        }
    
        foreach ($fileDate as $importCsvFile) {
            $fp_write = fopen($this->contents_file, "a");
            $fileContents = file_get_contents($importCsvFile);
            fwrite($fp_write, $fileContents);
        }
    }

    //継続か否か
    public function isContinue(){
        $validation = new ContinueValidation;
        echo "続いて操作を行いますか? 1:YES, 2:N0, \n";
        $continue = self::JUDGE_CONTINUE[trim(fgets(STDIN))];

        if(!$validation->check($continue)){
            $errors = $validation->getErrorMessages();
            $this->showErrorMessages($errors);
            return $this->isContinue();
        }
        if(!$continue){
            echo "ご利用ありがとうございました。\n";
            return false;
        }
        return true;
    }

    public function showErrorMessages($errors){
        foreach ($errors as $error) {
            echo $error;
        }
    }
}

$goods = new Goods();
$goods->main();

?>