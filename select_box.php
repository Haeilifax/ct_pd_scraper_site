<?php
$select_box["last_name"]="<option value='last_name'>Last Name</option>\n";
$select_box["first_name"]="<option value='first_name'>First Name</option>\n";
$select_box["pdcity"]="<option value='pdcity'>Police Dep. City</option>\n";
$select_box["date"]="<option value='date'>Date (YYYY-MM-DD)</option>\n";

$prev_selected = htmlspecialchars($_GET["form_type"]);

if ($select_box[$prev_selected]){
    $select_box[$prev_selected] = substr_replace($select_box[$prev_selected], "selected ", 8, 0);
}
foreach($select_box as $choice){
    echo $choice;
}
?>