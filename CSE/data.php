<head>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>

    .container{
        width: 100%;
        height: 100vh;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        overflow-y: scroll;
    }
    .subjects{
        width: 100%;
        /* height: 100vh; */
        padding: 15px;
        padding-top:30px;
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        
        align-items: center;
        justify-content: space-around;
        /* overflow-y: scroll; */

    }

    .container::-webkit-scrollbar{
        display: none;
    }
    .subject{
        width: 320px;
        background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        height: 180px;
        padding:10px;
        
        /* border:solid 1px black; */
        border-radius: 5px;
        display: flex;
        flex-direction:column;
        row-gap: 34px;
        align-items: center;
        justify-content: center;
        color:black;
        
        
    }

    .head{
        width: 100%;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .map{
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    .map a{
        color: black;
        text-decoration:none;
    }
    .btn:focus{
  border-color: rgba(251, 248, 248, 0.352);
  box-shadow: none;
}

    .dropdown button{
        
        text-transform: uppercase;
        font-size: 20px;
    }
    /* .dropdown { position: static; }
.dropdown-menu { width: 80%; text-align: center; }
.dropdown-menu>li { display: inline-block; } */

    
    .showmsg{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
</style>

<div class="container">

<div class="head"><h1>CSE</h1>


</div>

<div class="choose">
<div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style=" width:100%; background:  linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);color: black; border-color:black;">
        
        <?php 
        if(isset($_GET['sem'])){
          $brnch_nme = $_GET['sem'];
          echo $brnch_nme ;
        }
        else{
          echo "Choose Semester";
        }
        
        ?>
      </button>
      <ul class="dropdown-menu" style="width: 100%; background:  linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
        <li><a class="dropdown-item" href="index.php?semester=1&sem=SEMESTER-I">I</a></li>
        <li><a class="dropdown-item" href="index.php?semester=2&sem=SEMESTER-II">II</a></li>
        <li><a class="dropdown-item" href="index.php?semester=3&sem=SEMESTER-III">III</a></li>
        <li><a class="dropdown-item" href="index.php?semester=4&sem=SEMESTER-IV">IV</a></li>
        <li><a class="dropdown-item" href="index.php?semester=5&sem=SEMESTER-V">V</a></li>
        <li><a class="dropdown-item" href="index.php?semester=6&sem=SEMESTER-VI">VI</a></li>
        <li><a class="dropdown-item" href="index.php?semester=7&sem=SEMESTER-VII">VII</a></li>
        <li><a class="dropdown-item" href="index.php?semester=8&sem=SEMESTER-VIII">VIII</a></li>
        
      </ul>
    </div>
</div>
    <div class="subjects">


        <?php 
include('../includes/db.php');

if(isset($_GET['semester']))
{

$semester = $_GET['semester'];

$get_subjects = "SELECT * FROM SUBJECTS where branch_id=1 and sem_no=$semester";
$con_subjects = mysqli_query($con,$get_subjects);

while($row=mysqli_fetch_assoc($con_subjects))
{
    echo " <div class='subject'>
        <div class='name'> {$row['subject_name']}</div>
        <div class='map'>

            <a href='index.php?viewques&subj={$row['subject_id']}'><i class='fas fa-eye'></i> View</a>
            <a href='index.php?uploadque&subj={$row['subject_id']}'><i class='fas fa-plus'></i> Upload</a>
           </div>
   
</div>";
}
        
}
else{
    echo "
    <div class='showmsg' style='margin-top:150px;'>

        <h1>SELECT SEMESTER</h1>
    </div>";
    
} 
        ?>
        
   <!-- <div class='subject'>
    
    <div class="line"></div>
    
</div> -->
    
    
</div>
    


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>