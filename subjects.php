<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
</head>
<style>
  .container{
    width: 100%;
    height: 100vh;
    padding-left: 16px;
        overflow-y: scroll;
    padding-top: 15px;

    display: flex;
    flex-direction: column;
  }
 
    .container::-webkit-scrollbar {
    display: none;
}
  .head{
    width: 100%;
    height: 50px;
   
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .head h2{
    color: rgba(0, 0, 0, 0.867);
  }
  .row1{
        width: 100%;
        display:flex;
        align-items: center;
        justify-content: space-around;
        margin-bottom: 30px;
        margin-top:10px;
        column-gap: 10%;

    }

    .row1 a{
        /* margin-left: 10%; */
        font-size: 18px;
        text-decoration: none;
        color: black;
    }
    th,tr{
        text-align: center;
        text-wrap: wrap;
    }

    table{
        border:solid 1px black;
    }
    .form-select:focus{
  border-color: black;
  box-shadow: none;
}



</style>
<body>
  <div class="container">
<div class="head"><h2>SUBJECTS</h2></div>
<div class="row1">
    <a href="index.php?addsubject">Add Subject</a> 
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: white;color: black;">
        
        <?php 
        if(isset($_GET['subject'])){
          $brnch_nme = $_GET['subject'];
          echo $brnch_nme ;
        }
        else{
          echo "Choose Branch";
        }
        
        ?>
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="index.php?subjects&subject=bsh">BSH</a></li>
        <li><a class="dropdown-item" href="index.php?subjects&subject=cse">CSE</a></li>
        <li><a class="dropdown-item" href="index.php?subjects&subject=aiml">AIML</a></li>
        <li><a class="dropdown-item" href="index.php?subjects&subject=aids">AIDS</a></li>
        <li><a class="dropdown-item" href="index.php?subjects&subject=it">IT</a></li>
        <li><a class="dropdown-item" href="index.php?subjects&subject=mech">MECH</a></li>
        <li><a class="dropdown-item" href="index.php?subjects&subject=civil">CIVIL</a></li>
        <li><a class="dropdown-item" href="index.php?subjects&subject=ece">ECE</a></li>
        <li><a class="dropdown-item" href="index.php?subjects&subject=eee">EEE</a></li>
       
        
      </ul>
    </div>
</div>


<?php 

if(isset($_GET['subjects']) and isset($_GET['subject']))
{
echo "<table class='table'>
<thead>
  <tr>
    <th scope='col'>S.NO</th>
    <th scope='col'>Subject Code</th>
    <th scope='col'>Subject Name</th>
    <th scope='col'>Regulation</th>
    <th scope='col'>Semester</th>

    <th scope='col'>Edit</th>
  </tr>
</thead>
<tbody>";

}

?>


  <?php 
  include('includes/db.php');

  if(isset($_GET['subjects']) and isset($_GET['subject']))
{
  $branch_name= $_GET['subject'];
  $branch_query = "SELECT * FROM BRANCHES where branch_name ='$branch_name'";
  $branch_exe = mysqli_query($con,$branch_query);
  $fetch_branch=mysqli_fetch_assoc($branch_exe);
  $branch_id = $fetch_branch['branch_id'];
  $show_branches = "SELECT * FROM subjects where branch_id=$branch_id";
  $branches_exe = mysqli_query($con,$show_branches);
  $s_no=1;
  while($row=mysqli_fetch_assoc($branches_exe))
  {
      echo " <tr>
      <th scope='row'>{$s_no}</th>
      <td>{$row['subject_code']}</td>
      <td>{$row['subject_name']}</td>
      <td>AR{$row['sub_reg']}</td>
      <td>{$row['sem_no']}</td>
      
      
      <td><a href='index.php?editsubject={$row['subject_id']}'><i class='fas fa-edit'></i></a></td>
    </tr>";
  
    $s_no++;
  }
  echo "</tbody>
  </table>";
}




  ?>
      
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      
    
  </div>
</body>
</html>