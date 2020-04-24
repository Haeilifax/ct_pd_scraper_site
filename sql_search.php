<?php
include "exceptions.php";
$form_type = htmlspecialchars($_GET["form_type"], ENT_HTML5|ENT_QUOTES, "UTF-8");
$input = htmlspecialchars($_GET["input"], ENT_HTML5|ENT_QUOTES, "UTF-8");

if ($input) {
    try {
        $sql = include("search_db/" . $form_type . ".php");
    } catch(Form_Validation_Error $e){
        // Exit non-destructively on incorrectly written input
        return;
    }
    $fname = $lname = $date = $pdcity = $content = Null;

    $sql->bind_result($fname, $lname, $date, $pdcity, $content);

    echo "<table class='table-bordered table-hover'>
    <thead>
        <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date(ISO)</th>
        <th>Police Dep. City</th>
        <th>Content</th>
        </tr>
    </thead>";

    echo "<tbody>";

    $table_index = 0;
    while($sql->fetch()){
        echo "<tr onclick='showDiv($table_index)'>
        <td>$fname</td>
        <td>$lname</td>
        <td>$date</td>
        <td>$pdcity</td>
        <td>$content</td>
        </tr>
        <tr hidden='true' id='$table_index'><td colspan='5'>$content</td></tr>";
        $table_index++;
    }
    echo "</tbody>
          </table>";

    $sql->close();

}
?>
