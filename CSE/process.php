<?php
session_start();
include('../includes/db.php');
  if (isset($_POST['inputValue'])) {

      $selectedValue = $_POST['inputValue'];
$_SESSION['value']= $selectedValue;
      $get_branch = "SELECT subject_name FROM SUBJECTS where branch_id=1 and sem_no=$selectedValue ";
      $exc_branch = mysqli_query($con,$get_branch);

      $array= array();
      while($exe_branch = mysqli_fetch_assoc($exc_branch))
{
    array_push($array,$exe_branch['subject_name']);
   
}
  print_r(json_encode(array("data" => $array)));
    //  print_r($array);
//  echo $selectedValue;
      

  
  } else {
      // If 'inputValue' is not set, provide an error message
      echo "Error: inputValue parameter is not set.";
  }
  ?>