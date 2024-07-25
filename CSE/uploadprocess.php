
<!DOCTYPE html>
<html lang="en">

<body>
    <style>
        * {
  font-family: sans-serif; /* Change your font family */
}
    
    
    .content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

</style>

<?php 


require 'vendor/autoload.php';
include('../includes/db.php');

use PhpOffice\PhpSpreadsheet\IOFactory;


function displayTableData($sheetData) {
    echo '<h2>Table Data</h2>';
    echo '<table border="1">';
    foreach ($sheetData as $row) {
        echo '<tr>';
        foreach ($row as $cell) {
            echo '<td>' . $cell . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
function similarityPercentage($str1, $str2)
{
    similar_text($str1, $str2, $percentage);
    return round($percentage, 2);
}



function displayDupData($sheetData)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "gmrit";
    $conn = mysqli_connect($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo '<table border="1" class="content-table"> <thead>';
    echo '<tr><th>Excel Question</th><th>Matching Question</th><th>Matching Percentage</th></tr></thead>';

    foreach ($sheetData as $row) {
        // Take only the first column of each row in $sheetData
        $excelQuestion = reset($row);

        echo '<tr>';
        
        // Check if there are similar questions in the database using the Levenshtein distance
        $sql = "SELECT que_desc FROM questions";
        $result = $conn->query($sql);

        $maxSimilarity = 0;
        $matchingQuestion = "";

        while ($dbRow = $result->fetch_assoc()) {
            $similarity = similarityPercentage($excelQuestion, $dbRow['que_desc']);
            if ($similarity > $maxSimilarity) {
                $maxSimilarity = $similarity;
                $matchingQuestion = $dbRow['que_desc'];
            }
        }

        // Display Excel Question, Matching Question, and Matching Percentage
        echo '<td>' . $excelQuestion . '</td>';
        echo '<td>' . $matchingQuestion . '</td>';
        echo '<td>' . $maxSimilarity . '%</td>';
        
        echo '</tr>';
    }

    echo '</table>';

    $conn->close();
}


// function displayDupData($sheetData)
// {
//     $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "gmrit";
// $conn = mysqli_connect($servername,$username,$password,$database);

//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     echo '<table border="1">';
//     echo '<tr><th>Excel Question</th><th>Matching Question</th><th>Matching Percentage</th></tr>';

//     foreach ($sheetData as $row) {
//         echo '<tr>';
//         foreach ($row as $cell) {
//             // Check if there are similar questions in the database using the Levenshtein distance
            
//             $sql = "SELECT que_desc FROM questions ";
//             $result = $conn->query($sql);

//             $maxSimilarity = 0;
//             $matchingQuestion = "";

//             while ($dbRow = $result->fetch_assoc()) {
//                 $similarity = similarityPercentage($cell, $dbRow['que_desc']);
//                 if ($similarity > $maxSimilarity) {
//                     $maxSimilarity = $similarity;
//                     $matchingQuestion = $dbRow['que_desc'];
//                 }
//             }

//             // Display Excel Question, Matching Question, and Matching Percentage
//             echo '<td>' . $cell . '</td>';
//             echo '<td>' . $matchingQuestion . '</td>';
//             echo '<td>' . $maxSimilarity . '%</td>';
//         }
//         echo '</tr>';
//     }
//     echo '</table>';

//     $conn->close();
// }

// function displayDupDat($sheetData)
// {
//     $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "gmrit";
// $conn = mysqli_connect($servername,$username,$password,$database);

//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     echo '<table border="1">';
//     foreach ($sheetData as $row) {
//         echo '<tr>';
//         foreach ($row as $cell) {
//             // Check if there are similar questions in the database using the LIKE operator
//             $sql = "SELECT * FROM questions WHERE sub_id=1 AND  que_desc LIKE '%" . $cell . "%'";
//             $result = $conn->query($sql);

//             if ($result->num_rows > 0) {
//                 // Question has similar words in the database, display it with highlighting
//                 echo '<td style="color: red;">' . $cell . '</td>';
//             } else {
//                 // Question doesn't have similar words in the database, display it normally
//                 echo '<td>' . $cell . '</td>';
//             }
//         }
//         echo '</tr>';
//     }
//     echo '</table>';

//     $conn->close();
// }

function storeInDatabase($sheetData,$subj_id,$diff, $unitNo) {
    $servername = "localhost";
$username = "root";
$password = "";
$database = "gmrit";
$con = mysqli_connect($servername,$username,$password,$database);

        $subj_id_value = $subj_id;
        $diff_value = $diff;
        
        $unitNoValue = $unitNo;
    foreach ($sheetData as $row) {
        // Adjust column indexes and table name according to your database schema
        
        $column3 = $row['A'];

        $column4 = $row['B'];
       
        

        // Add more columns as needed

        // SQL query to insert data into the database
        $sql = "INSERT INTO  questions(que_desc,sub_id,que_mode,que_marks,unit_no) VALUES ('$column3',$subj_id_value,$diff_value,$column4,$unitNoValue)";

        $insert_que = mysqli_query($con,$sql);
        
    }

    

    echo "<script>alert('Data Uploaded succesfully')</script>";

   
}















if(isset($_GET['subj_id']))
{
    $subj_id = $_GET['subj_id'];
}


if(isset($_POST['similar']))
{
    $diff = $_POST['diff'];
    $unitNo = $_POST['unit'];
    
    if ($_FILES['que']['name']) {
        $filename = explode('.', $_FILES['que']['name']);
        if ($filename[1] == 'xls' || $filename[1] == 'xlsx') {
            $spreadsheet = IOFactory::load($_FILES['que']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            // Display the table data
            displaydupData($sheetData);
            
        } else {
            echo "Invalid file format. Please upload an Excel file.";
        }
    } else {
        echo "Please choose a file";
    }
    


}

if(isset($_POST['addque']))
{   

    $diff = $_POST['diff'];
    // $marks = $_POST['marks'];
    $unitNo = $_POST['unit'];
    

    if ($_FILES['que']['name']) {
        $filename = explode('.', $_FILES['que']['name']);
        if ($filename[1] == 'xls' || $filename[1] == 'xlsx') {
            $spreadsheet = IOFactory::load($_FILES['que']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            // Display the table data
            displayTableData($sheetData);
            storeInDatabase($sheetData,$subj_id,$diff, $unitNo);
        } else {
            echo "Invalid file format. Please upload an Excel file.";
        }
    } else {
        echo "Please choose a file";
    }

    // $que_des = $_POST['que'];
    // $diff = $_POST['diff'];
    // $marks = $_POST['marks'];
    // $exam_type = $_POST['unit'];
    // $insert_sql = "INSERT INTO questions(que_desc, sub_id, que_mode, que_marks,unit_no) VALUES('$que_des',$subj_id,'$diff','$marks',$exam_type)";
    // $sql_exe = mysqli_query($con,$insert_sql);
    // if($sql_exe)
    // {
    //     echo"<script>window.alert('Question Added ')</script>";
    //     echo "<script>window.open('index.php?uploadque&subj={$subj_id}','_self')</script>";
    // }

}


?>

</body>
</html>
