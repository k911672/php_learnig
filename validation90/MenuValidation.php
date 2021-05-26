<?php 
    require_once ("BaseValidation.php"); 

    class MenuValidation extends BaseValidation  {
        public function check($inputMenu){
            //数値意外を入れた時のバリデーション
            if (!is_numeric($inputMenu)){
                $this->errors[] = "数値を入力ください\n";
                return false;
            }
            if ($inputMenu > 4 || $inputMenu < 1){
                $this->errors[] = "選択肢からお選びください。\n";
                return false;
            }
            return true;
        }
    }
?>