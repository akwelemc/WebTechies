<?php
include("../action/get_history.php");

$results = getTripDetails();
// var_dump($result);
// exit();
foreach ($results as $result) {
    // echo "a,a";
    echo '
        <tr>
            <td>' . $result['bid'] . '</td>
            <td>
                ' . $result['time']. ' 
            </td>
            <td>
            ' . $result['date_booked'] . ' 
            </td>
            <td>
            ' . $result['stopName'] . ' 
        </td>
        <td>
            <a style="color: #e74c3c;" class = "delete_icon" href="../action/delete_assignmemt.php?chore_id=' . $result['bid'] . '">
            <i class="fa-solid fa-trash-can"></i>
        </a>
        <a style="color: #e74c3c;"class = "edit_icon" href="../view/edit_assignment.php?chore_id=' . $result['bid'] . '">
            <i class="fa-solid fa-pen-to-square"></i> 
        </a> 
        </td>

        </tr>
    ';
}