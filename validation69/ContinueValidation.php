<?php 
    require_once ("BaseValidation.php"); 

    class ContinueValidation extends BaseValidation {
        public function check($continue){
            if(!is_bool($continue)){
                $this->errors[] = "入力値が間違っています。\n";
                return false;
            }
            return true;
        }
    }

?>