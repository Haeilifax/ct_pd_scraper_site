<?php
include "exceptions/FormValidationError.php";
class Validator{
    public function validate($type, $string){
        switch ($type){
            case "date":
                return $this->validateDate($string);
            break;
            case "first_name":
                return $this->validateFName($string);
            break;
            case "last_name":
                return $this->validateLName($string);
            break;
            case "pdcity":
                return $this->validatePdcity($string);
            break;
        }
    }

    private function validateDate($string){
        if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $string)) {
            echo ("Please enter a valid ISO date (YYYY-MM-DD)");
            throw new Form_Validation_Error;
        }
        return true;
    }

    private function validateFName($string){
        if (!preg_match("/^[a-zA-Z ]*$/", $string)) {
            echo ("Only letters and white space allowed in First Name field");
            throw new Form_Validation_Error;
        }
        return true;
    }

    private function validateLName($string){
        if (!preg_match("/^[a-zA-Z '-]*$/", $string)) {
            echo ("Only letters, white space, apostrophe, and hyphen allowed in Last Name field");
            throw new Form_Validation_Error;
        }
        return true;
    }

    private function validatePdcity($string){
        if (!preg_match("/^[a-zA-Z ]*$/", $string)) {
            echo ("Only letters and white space allowed in Police Department City field");
            throw new Form_Validation_Error;
        }
        return true;
    }
}
?>