<?php
echo "<table class='table-bordered table-hover'>
    <thead>
        <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date(ISO)</th>
        <th>Police Dep. City</th>
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
    </tr>
    <tr hidden='true' id='$table_index'><td colspan='4'><b>Content:</b> $content</td></tr>";
    $table_index++;
}
echo "</tbody>
        </table>";

?>