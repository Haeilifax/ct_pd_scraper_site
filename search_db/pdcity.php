<?php
$pdcityValidator = new Validator;
$pdcityValidator->validate("pdcity", $input);

$sql = $conn->prepare("SELECT first_name, last_name, date, pdcity, content FROM person_view where pdcity=?");
$sql->bind_param("s", $input);

$sql->execute();
return $sql;
?>