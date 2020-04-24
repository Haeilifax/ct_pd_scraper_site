<?php
include "../exceptions.php";
if (!preg_match("/^[a-zA-Z '-]*$/", $input)) {
    echo ("Only letters, white space, apostrophe, and hyphen allowed in Last Name field");
    throw new Form_Validation_Error;
}
    $sql = $conn->prepare("SELECT first_name, last_name, date, pdcity, content FROM person_view where last_name=?");
    $sql->bind_param("s", $input);

    $sql->execute();
    return $sql;
?>