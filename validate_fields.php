<?php
if ($_GET["form_type"]){
    include "sql_search.php";
}
elseif($_GET["last_name_checked"] Or $_GET["first_name_checked"] Or $_GET["date_checked"] Or $_GET["pdcity_checked"]){
    include "advanced_search.php";
}


?>