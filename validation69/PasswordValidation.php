<?php 
    require_once ("BaseValidation.php"); 
    
    class PasswordValidation extends BaseValidation {
        const LIMIT = 3;
        public static $count = 0;

        public function check($inputPassword, $password){
            //パスワードを一致させるバリデーション
            if($inputPassword !== $password){
                $this->errors[] = "パワスワードが間違っております。\n";
                PasswordValidation::$count++;
                if(self::$count >= self::LIMIT){
                    $this->errors[] = "またのご利用をお待ちしております。\n";
                    return false;
                }
                return false;
            }
            return true;
        }
    }
?>