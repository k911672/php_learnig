<?php
require_once ("validation69/ContinueValidation.php"); 
require_once ("validation69/MenuValidation.php"); 
require_once ("validation69/PasswordValidation.php"); 
require_once ("validation69/PaymentValidation.php"); 
require_once ("validation69/UserIdValidation.php"); 
require_once ("validation69/WithdrawalValidation.php"); 

class User {
    public $user_list = array (
        1 => array(
            "id" => "1",
            "password" => "1234",
            "name" => "tanaka",
            "balance" => "500000"
        ),
        2 => array(
            "id" => "2",
            "password" => "3456",
            "name" => "suzuki",
            "balance" => "1000000"
        )
    ); 

    public function getUserInfoById($inputId){
        $this->user_list;
        return $this->user_list[$inputId];
    }
}

class Atm {
    const MENU_BALANCE = 1;
    const MENU_PAYMENT = 2;
    const MENU_WITHDRAWAL = 3;
    const MENU_FINISH = 4;

    const JUDGE_CONTINUE = [
        "1" => true,
        "2" => false
    ];

    public static $depositMoney = 0;

    //ログイン機能
    public $user;
    public function __construct($users) {
        $this->login($users);
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
        $userInfo = $users->getUserInfoById($inputId);
        $this->user = $userInfo["name"];
        $userPassword = $userInfo["password"];
        $this->depositMoney = $userInfo["balance"];
        echo "パスワードを入力お願いいたします。\n";
        $this->inputPassword($userPassword);
        echo $this->user."様、いらっしゃいませ。\n";
    }

    //パスワード入力
    public function inputPassword($password){
        $inputPassword = trim(fgets(STDIN));

        $validation = new PasswordValidation;

        if(!$validation->check($inputPassword, $password)){
            if(PasswordValidation::$count >= PasswordValidation::LIMIT){                
                $errors = $validation->getErrorMessages();
                $this->showErrorMessages($errors);
                exit;
            }
            $errors = $validation->getErrorMessages();
            $this->showErrorMessages($errors);
            return $this->inputPassword($password);
        }
    }

    //メイン操作
    public function main(){
        switch($this->selectMenu()){
            case self::MENU_BALANCE:
                $this->showBalance();
                break;
            case self::MENU_PAYMENT:
                $this->paymentMoney();
                break;
            case self::MENU_WITHDRAWAL:
                $this->withdrawalMoney();
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

    //残高照会のメソッド
    public function showBalance(){
        echo $this->depositMoney."円\n";
    }
    //入金のメソッド
    public function paymentMoney(){
        echo "入金額を記入お願いいたします。\n";
        $input = trim(fgets(STDIN));

        $validation = new PaymentValidation;

        if(!$validation->check($input)){
            $errors = $validation->getErrorMessages();
            $this->showErrorMessages($errors);
            return $this->paymentMoney();
        }
        $this->depositMoney += $input;
    }
    //出金のメソッド
    public function withdrawalMoney(){
        echo "出金額を記入お願いいたします。\n";
        $input = trim(fgets(STDIN));

        $validation = new WithdrawalValidation;

        if(!$validation->check($this->depositMoney, $input)){
            $errors = $validation->getErrorMessages();
            $this->showErrorMessages($errors);
            return $this->withdrawalMoney();
        }
        $this->depositMoney -= $input;
    }

    //メニューの選択
    public function selectMenu(){
        echo  "ご利用のメニューをお選びください。 1:残高照会, 2:入金, 3:出金, 4:終了\n";
        $inputMenu = trim(fgets(STDIN));

        $validation = new MenuValidation;

        if (!$validation->check($inputMenu)){
            $errors = $validation->getErrorMessages();
            $this->showErrorMessages($errors);
            return $this->selectMenu();
        }
        return $inputMenu;
    }

    //継続か否か
    public function isContinue(){
        echo "続いて操作を行いますか? 1:YES, 2:N0, \n";
        $continue = self::JUDGE_CONTINUE[trim(fgets(STDIN))];

        $validation = new ContinueValidation;

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

$users = new User;
$atm = new Atm($users);
$atm->main();

?>