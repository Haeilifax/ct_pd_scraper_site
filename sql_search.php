<?php
include "exceptions/FormValidationError.php";
$form_type = htmlspecialchars($_GET["form_type"], ENT_HTML5|ENT_QUOTES, "UTF-8");
$input = htmlspecialchars($_GET["input"], ENT_HTML5|ENT_QUOTES, "UTF-8");

if ($input) {
    try {
        $sql = include("search_db/" . $form_type . ".php");
    } catch(Form_Validation_Error $e){
        // Exit non-destructively on incorrectly written input
        return;
    }
    $fname = $lname = $date = $pdcity = $content = Null;

    $sql->bind_result($fname, $lname, $date, $pdcity, $content);

    include "tabler.php";

    $sql->close();

}
?>
