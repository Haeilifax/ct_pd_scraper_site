<?php
$fNameValidator = new Validator();
$fNameValidator->validate("first_name", $input);

$sql = $conn->prepare("SELECT first_name, last_name, date, pdcity, content FROM person_view where first_name=? ORDER BY date");
$sql->bind_param("s", $input);

$sql->execute();
return $sql;
?>