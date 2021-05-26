<?php 
    require_once ("BaseValidation.php"); 

    class RegisterValidation extends BaseValidation  {
        public function checkId($inputId){
            if(!is_numeric($inputId)){
                $this->errors[] = "数値を入力してください\n";
                return false;
            }
            return true;
        }
        public function checkGoodsName($goods){
            if(mb_strlen($goods) > 20){
                $this->errors[] = "商品名は20文字以内で登録お願いいたします。\n";
                return false;
            }
            return true;
        }
    }
?>