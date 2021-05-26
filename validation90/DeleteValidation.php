<?php 
    require_once ("BaseValidation.php"); 

    class DeleteValidation extends BaseValidation  {
        public function check($deleteId, $registerId){
            if(!is_numeric($deleteId)){
                $this->errors[] = "数値を入力ください\n";
                return false;
            }
            if(!in_array($deleteId, $registerId)){
                $this->errors[] = "登録されているidからお選びください\n";
                return false;
            }
            return true;
        }
    }
    
?>