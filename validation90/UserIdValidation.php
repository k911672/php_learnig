<?php 
    require_once ("BaseValidation.php"); 

    class UserIdValidation extends BaseValidation  {
        public function check($inputId, $users){
            if(!is_numeric($inputId)){
                $this->errors[] = "数値を入力ください"; 
                return false;
            }

            if(!array_key_exists($inputId, $users)){
                $this->errors[] = "一致するIDがございません";
                return false;
            }
            return true;
        }
    }
?>