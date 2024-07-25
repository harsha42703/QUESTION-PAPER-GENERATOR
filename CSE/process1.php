<?php
// update_last_num_rows.php

// Check if lastNumRows is set in the POST data
if (isset($_POST['lastNumRows'])) {
    // Retrieve the value
    $lastNumRows = $_POST['lastNumRows'];

    // Now you can use $lastNumRows as needed, for example, you can store it in a session variable
    session_start();
    $_SESSION['lastNumRows'] = $lastNumRows;

    // You can also echo a response back to the client
    echo "Last number of rows updated to: $lastNumRows";
} else {
    // Handle the case where lastNumRows is not set
    echo "Error: lastNumRows is not set in the POST data";
}
?>
