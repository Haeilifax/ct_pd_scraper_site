<?php
$formTypes = ["first_name"=>$_GET["first_name_checked"],
"last_name"=>$_GET["last_name_checked"],
"pdcity"=>$_GET["pdcity_checked"],
"date"=>$_GET["date_checked"]];

$whereArray = [];
$inputs = [];
$sArray =[];

$loopIndex = 0;
foreach ($formTypes as $formType=>$checked){
    if ($checked){
        $inputs[] = $_GET[$formType];
        $whereArray[] = $formType . "=?";
        $sArray[] = "s";
    }
    $loopIndex++;
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