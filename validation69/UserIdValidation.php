<?php 
    require_once ("BaseValidation.php"); 
    
    class UserIdValidation extends BaseValidation  {
        public function check($inputId, $users){
            //ID確認のバリデーション
            if(!array_key_exists($inputId, $users->user_list)){
                $this->errors[] = "一致するIDがございません。もう一度やり直してください。\n";
                return false;
            }
            return true;
        }
    }

?>