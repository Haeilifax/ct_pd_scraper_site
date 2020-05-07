<?php
$lNameValidator = new Validator();
$lNameValidator->validate("last_name", $input);

$sql = $conn->prepare("SELECT first_name, last_name, date, pdcity, content FROM person_view where last_name=? ORDER BY date");
$sql->bind_param("s", $input);

$sql->execute();
return $sql;
?>