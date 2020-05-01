<?php
$form_type = htmlspecialchars($_GET["form_type"], ENT_HTML5|ENT_QUOTES, "UTF-8");

if ($form_type){
    include "sql_search.php";
}
elseif($_GET["last_name_checked"] Or $_GET["first_name_checked"] Or $_GET["date_checked"] Or $_GET["pdcity_checked"]){
    include "advanced_search.php";
}


?>