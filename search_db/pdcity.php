<?php
include "../exceptions.php";
if (!preg_match("/^[a-zA-Z ]*$/", $input)) {
        echo ("Only letters and white space allowed in Police Department City field");
        throw new Form_Validation_Error;
    }

    $sql = $conn->prepare("SELECT first_name, last_name, date, pdcity, content FROM person_view where pdcity=?");
    $sql->bind_param("s", $input);

    $sql->execute();
    return $sql;
?>