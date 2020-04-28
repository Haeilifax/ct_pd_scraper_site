<?php
include "../exceptions/FormValidationError.php";
if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $input)) {
        echo ("Please enter a valid ISO date (YYYY-MM-DD)");
        throw new Form_Validation_Error;
    }

    $sql = $conn->prepare("SELECT first_name, last_name, date, pdcity, content FROM person_view where date=?");
    $sql->bind_param("s", $input);

    $sql->execute();
    return $sql;
?>