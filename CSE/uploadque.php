








<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>

<style>
    .container{
        width:100%;
        height: 100vh;
        overflow-y: scroll;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 10px;
        

    }

    .selections{
        margin-bottom: 10px;
    }
    .container::-webkit-scrollbar{
        display: none;
    }
    .checks{
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
    #Login{
        width: 250px;
        padding: 8px;
        border: none;
        background: #c3cfe2;
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px;
        font-size: 19px;
        margin-top: 30px;
        border-radius: 6px;
        cursor: pointer;
        
        
    }
    .head{
        color: black;
        font-size: 25px;
        padding: 10px;
        width:100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form{
        margin-top: 30px;
        border-radius: 7px;
        padding: 15px;
        width: 100%;
        min-height: 400px;
        display:flex;
        flex-direction:column;
        border: solid 1px rgb(231, 226, 226);
        /* box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; */
    }
    .form-control:focus ,.form-select:focus{
  border-color: rgba(251, 248, 248, 0.352);
  box-shadow: none;
}

input{
    background: transparent;
}



iframe{
    display: none;
}

                .similarities{
                    width:100%;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    padding: 50px;
                    justify-content: flex-start;
                    row-gap: 50px;
                    font-size: 18px;
                    padding-bottom: 100px;
                    /* border: solid 2px black; */
                    border-radius: 7px;
                    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                   
                }

                .similarities .hed{
                    color: black;
                    font-size: 25px;
                    
                }
         .similarities .que{
            width:100%;
            border:solid 1px black;
            padding:13px;
            border-radius: 7px;
            font-family: Arial, Helvetica, sans-serif;
            text-wrap: wrap;
         }

    select{
        cursor: pointer;
    }

    .examtype{
        width: 100%;
        margin-top: 50px;
        display:flex;
        align-items: center;
        justify-content: center;
        column-gap:40px;
    }
</style>

<?php 

include('../includes/db.php');

if(isset($_GET['subj']))
{
    $subj_id = $_GET['subj'];
}


?>



<?php
if(isset($_POST['simi'])){
    $que_des = $_POST['que'];
    $diff = $_POST['diff'];
    $marks = $_POST['marks']; 
    $exam_type = $_POST['examtype'];
    $get_que = "SELECT que_desc FROM questions WHERE sub_id=$subj_id and exam_type=$exam_type";
    $ques_exe = mysqli_query($con,$get_que);
    
    $questionsArray = array();
  
  while ($row = mysqli_fetch_assoc($ques_exe)) {
      // Add each question to the array
      $questionsArray[] = $row['que_desc'];
  }


$url = 'http://127.0.0.1:8000/gmritapp/';
$data = [
    'input_question' => $que_des,
    'question_list' => $questionsArray,
];

$options = [
    'http' => [
        'header'  => 'Content-type: application/json',
        'method'  => 'POST',
        'content' => json_encode($data),
    ],
];

$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);

// Handle the response from Django
$result = json_decode($response, true);
// print_r($result);
}

?>

    <div class="container">
        <div class="head">Upload Question</div>

        <div class="form">
            <form action="uploadprocess.php?subj_id=<?php echo $subj_id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-input mb-3">
                    <input name="que" type="file" class="form-control w-100 " style="height: 50px; background:linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%) ; " placeholder="Enter Question here..." required>
                    
                </div>

                <div class="selections">
                    <select name="diff" class="form-select" style="background:linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%) ;" aria-label="Default select example" required>
                        <option selected>Choose Complexity</option>
                        <option value="1">Easy</option>
                        <option value="2">Medium</option>
                        <option value="3">Hard</option>
                        <option value="4">Self Study</option>
                        
                    
                        
                </select>
                </div>
                <!-- <div class="selections">
                    <select name="marks" class="form-select" style="background:linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%) ;" aria-label="Default select example" required>
                        <option selected>Question Marks</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="10">10</option>
                        <option value="14">14</option>
                        
                    
                        
                </select>
                </div> -->

                <div class="examtype">
                <div class="form-check">
  <input class="form-check-input" type="radio" name="unit" id="flexRadioDefault1" value="1" checked>
  <label class="form-check-label" for="flexRadioDefault1">
    Unit1
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="unit" value="2" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
   Unit2
  </label>
</div>
                <div class="form-check">
  <input class="form-check-input" type="radio" name="unit" id="flexRadioDefault1" value="3" >
  <label class="form-check-label" for="flexRadioDefault1">
    Unit3
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="unit" value="4" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
   Unit4
  </label>
</div>
                </div>

                <div class="checks">
                    <input name="similar" id="Login" type="submit" value="Check Similairty">
                    <input name="addque" id="Login" type="submit" value="Add Question">
                </div>

            </form>

           
                
            </div>
            <?php 

            if(isset($_POST['simi']))
            {
                echo "<div class='similarities '>
                <div class='hed'>Similar Questions</div>
                ";
                foreach($result as $item => $val):
                    echo "<div class='que'>
                    $item <br>
                </div>";
            endforeach;

            echo "</div>";
            }
            
            
            ?>
            
                
           

        </div>

        
    </div>


    
    
    <script>window.addEventListener('load', function () {
        var loadingDiv = document.getElementById('loadingDiv');
        var contentDiv = document.getElementById('contentDiv');
              // Hide the loading div
        loadingDiv.style.display = 'none';
      
        // Show the content div
        contentDiv.style.display = 'block';
      });
      
      </script>