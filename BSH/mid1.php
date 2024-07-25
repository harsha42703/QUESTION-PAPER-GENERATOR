<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-eSLCc7eUqEMsEJpHRqurqJFszhpozZCgFEGrG8RmCGUxn25m45tHt9Zbg27iFNQ3" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>


<?php 

// session_start();

// if(isset($_SESSION['value']))
// {
//     echo $_SESSION['value'];
// }

?>


<style>
    h3{
        color:black;
    }
    .form-control:focus ,.form-select:focus{
  border-color: black;
  box-shadow: none;
}
.head{
    width:100%;
    display:flex;
    align-items:center;
    padding:5px;
    justify-content:space-around;
    margin-top: 10px;
    margin-bottom: 5px;
}

.head a{
    color: black;
    text-decoration: none;
    font-size: 19px;
    font-weight: 600;
}

.short,.long{
    width:100%;
    padding:10px;
    

}
.headers{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 14px;
}

#sems{
    margin-top:10px;
}

</style>


<?php 
 include('../includes/db.php');
if(isset($_POST['upload']))
{
   

    $subj = $_POST['branch'];
    $ftech_brnch = "SELECT * FROM subjects where subject_name='$subj'";
    $brnch_exe = mysqli_query($con,$ftech_brnch);
    $dtaa = mysqli_fetch_assoc($brnch_exe);
    $sbj_id = $dtaa['subject_code'];


    $questions = [];
    for ($i = 1; $i <= 5; $i++) {
        $questions[] = $_POST['q' . $i];
    }

    $lquestions = [];
    for ($i = 6; $i <= 11; $i++) {
        $lquestions[] = $_POST['q' . $i];
    }
    
    // Build a single query using a loop
    $sql = "INSERT INTO acadamic1 (que_desc, sub_id, que_type, que_marks, exam_type) VALUES ";
    foreach ($questions as $question) {
        $sql .= "('$question', '$sbj_id', 'short', 2, 'mid1'), ";
    }
    
    
    // Remove the trailing comma and execute the query
    $sql = rtrim($sql, ', ');
    $sql_exe = mysqli_query($con,$sql);

    $lsql = "INSERT INTO acadamic1(que_desc, sub_id, que_type, que_marks, exam_type) VALUES ";
    foreach ($lquestions as $question) {
        $lsql .= "('$question', '$sbj_id', 'long', 10, 'mid1'), ";
    }

    $lsql = rtrim($lsql, ', ');
    $lsql_exe = mysqli_query($con,$lsql);
    

    if($sql_exe && $lsql_exe){
        echo "<script>window.alert('Questions uploaded')</script>";
        echo "<script>window.open('index.php?exam=mid1','_self')</script>";
    }
    
   
}

?>
  <div class="container">
    <div class="head">
    <h3 > MID1 Paper</h3>

    <a href="index.php?checktool&exam=mid1&sub_id=21CS503"><h3>  <i class="fas fa-fw fa-tachometer-alt"></i> Check Similarity</h3></a>
    </div>

    <form method="post">
        <select name="semno" id="sem"  class="form-select" aria-label="Default select example" onchange=""  required>
            <option selected>Choose Sem</option>
            <option value="1">I</option>
            <option value="2">II</option>
            <option value="3">III</option>
            <option value="4">IV</option>
            <option value="5">V</option>
            <option value="6">VI</option>
            <option value="7">VII</option>
            <option value="8">VIII</option>
            
            
    </select>

    
    
    <select name="branch" id="sems" class="form-select" aria-label="Default select example" required>
                            <option selected>Choose Subject</option>
                           
                            
                    </select>


<div class="headers"><h3>Short answer questions </h3></div>
<div class="short">



<div class="form-floating mb-3">
    <input name="q1" type="text" class="form-control w-100 " id="floatingInput" placeholder="Username">
    <label for="floatingInput">Enter Question 1</label>
</div>

<div class="form-floating mb-3">
    <input name="q2" type="text" class="form-control w-100 " id="floatingInput" placeholder="Username">
    <label for="floatingInput">Enter Question 2</label>
</div>

<div class="form-floating mb-3">
    <input name="q3" type="text" class="form-control w-100 " id="floatingInput" placeholder="Username">
    <label for="floatingInput">Enter Question 3</label>
</div>

<div class="form-floating mb-3">
    <input name="q4" type="text" class="form-control w-100 " id="floatingInput" placeholder="Username">
    <label for="floatingInput">Enter Question 4</label>
</div>

<div class="form-floating mb-3">
    <input name="q5" type="text" class="form-control w-100 " id="floatingInput" placeholder="Username">
    <label for="floatingInput">Enter Question 5</label>
</div>
</div>

<div class="headers"><h3>Long answer questions </h3></div>
<div class="long">
    

    <div class="form-floating mb-3">
        <input name="q6" type="text" class="form-control w-100 " id="floatingInput" placeholder="Username">
        <label for="floatingInput">Enter Question 6</label>
    </div>

    <div class="form-floating mb-3">
        <input name="q7" type="text" class="form-control w-100 " id="floatingInput" placeholder="Username">
        <label for="floatingInput">Enter Question 7</label>
    </div>

    <div class="form-floating mb-3">
        <input name="q8" type="text" class="form-control w-100 " id="floatingInput" placeholder="Username">
        <label for="floatingInput">Enter Question 8</label>
    </div>

    <div class="form-floating mb-3">
        <input name="q9" type="text" class="form-control w-100 " id="floatingInput" placeholder="Username">
        <label for="floatingInput">Enter Question 9</label>
    </div>

    <div class="form-floating mb-3">
        <input name="q10" type="text" class="form-control w-100 " id="floatingInput" placeholder="Username">
        <label for="floatingInput">Enter Question 10</label>
    </div>
    <div class="form-floating mb-3">
        <input name="q11" type="text" class="form-control w-100 " id="floatingInput" placeholder="Username">
        <label for="floatingInput">Enter Question 11</label>
    </div>
</div>

<input type="submit" value="UPLOAD" name="upload">

    </form>
    
    <?php 
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input value from the AJAX request
    $inputValue = $_POST['semno'];
    $result = "You entered: " . $inputValue;
    echo $result;
}
    
    ?>
  </div>
  <div id="result"></div>

  <script>

$(document).ready(function () {
            $("#sem").change(function () {
                var selectedValue = $(this).val();

               
                $.ajax({
                    type: "POST",
                    url: "process.php",
                    data: { inputValue: selectedValue },
                    dataType : 'json',
                    success: function (response) {
                        $("#result").html(response);
                        
                        let temp = response.data;
                        temp.forEach(function(ele){
                        let a = document.createElement("option");
                        a.innerHTML = ele;
                        document.querySelector("#sems").appendChild(a);
})
                        // console.log(response.data= );
                        
                        
                    }
                    
                });
            });
        });
  </script>


  
  
  
 
