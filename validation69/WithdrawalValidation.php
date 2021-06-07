<?php 
    require_once ("BaseValidation.php"); 
    
    class WithdrawalValidation extends BaseValidation  {
        public function check($depositMoney, $input){
            //出金の単位指定のバリデーション
            if(!is_numeric($input)){
                $input = 0;
                $this->errors[] = "数値を入力ください。\n";
                return false;
            }
            //出金の単位指定のバリデーション
            if($input % 1000 !== 0){
                $input = 0;
                $this->errors[] = "1000円単位で入出金お願いいたします。\n";
                return false;
            }
            //残高以上の出金をしようとした場合のバリデーション
            if($depositMoney - $input < 0){
                $input = 0;
                $this->errors[] = "これ以上お引き出しはできません。\n";
                return false;
            }
            return true;
        }
    }
?>