<?php
$dateValidator = new Validator();
$dateValidator->validate("date", $input);

$sql = $conn->prepare("SELECT first_name, last_name, date, pdcity, content FROM person_view where date=?");
$sql->bind_param("s", $input);

$sql->execute();
return $sql;
?>