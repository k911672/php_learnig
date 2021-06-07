<?php 
    require_once ("BaseValidation.php"); 
    
    class PaymentValidation extends BaseValidation {
        public function check($input){
            //入出金の単位指定のバリデーション
            if(!is_numeric($input)){
                $input = 0;
                $this->errors[] = "数値を入力ください。\n";
                return false;
            }
            //入出金の単位指定のバリデーション
            if($input % 1000 !== 0){
                $input = 0;
                $this->errors[] = "1000円単位で入出金お願いいたします。\n";
                return false;
            }
            return true;
        }
    }
?>