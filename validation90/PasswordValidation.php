<?php 
    require_once ("BaseValidation.php"); 

    class PasswordValidation extends BaseValidation  {
        public $count = 0;
        const LIMIT = 3;

        public function check($inputPassword, $userPassword){
            if($inputPassword !== $userPassword){
                $errors[] = "パスワードが間違っております";
                $this->count++;
                return false;
            }
            return true;
        }
    }
?>