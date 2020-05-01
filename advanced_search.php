<?php
include "Validator.php";
$formTypes = ["first_name"=>$_GET["first_name_checked"],
"last_name"=>$_GET["last_name_checked"],
"pdcity"=>$_GET["pdcity_checked"],
"date"=>$_GET["date_checked"]];

$whereArray = [];
$inputs = [];
$sArray =[];

$validator = new Validator();
foreach ($formTypes as $formType=>$checked){
    if ($checked){
        try{
        $validator->validate($formType, $_GET[$formType]);
        }
        catch (Form_Validation_Error $e){
            return;
        }
        $inputs[] = htmlspecialchars($_GET[$formType], ENT_HTML5|ENT_QUOTES, "UTF-8");
        $whereArray[] = $formType . "=?";
        $sArray[] = "s";
    }
}

$whereClause = implode(" AND ", $whereArray);
$sql = $conn->prepare("SELECT first_name, last_name, date, pdcity, content FROM person_view where " . $whereClause);
$sql->bind_param(implode($sArray), ...$inputs);
$sql->execute();

$fname = $lname = $date = $pdcity = $content = Null;
$sql->bind_result($fname, $lname, $date, $pdcity, $content);

include "tabler.php";

$sql->close();
?>