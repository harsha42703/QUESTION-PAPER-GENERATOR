<?php
if(isset($_POST['check'])){

$url = 'http://127.0.0.1:8000/gmritapp/';
$data = [
    'input_question' => 'Explain brief about the tcp/ip model',
    'question_list' => [
        'Explain Tcp/ip model in detail by diagram.',
        'Discuss tcp/ip reference model.',
        'write about tajmahal',
        'Explain brief about the tcp/ip model with examples',
        'who is abhishek',
        'what is tcp/ip',
    ],
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
}
// print_r($result);
?>

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
    <body>
        <style>
            .form-control:focus ,.form-select:focus{
  border-color: black;
  box-shadow: none;
}

.container{
    width:100%;
    height:100vh;
    overflow-y:scroll;
    padding: 20px;
    padding-top: 40px;
}
.head{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}
        </style>


<?php 
include('../includes/db.php');

if(isset($_GET['exam']) && isset($_GET['sub_id']))
{
    $exam_type = $_GET['exam'];
    $sub_id = $_GET['sub_id'];
    
    $get_questions = "SELECT * FROM acadamic1 where sub_id = '$sub_id' and exam_type='$exam_type'";
    $fetch_exe = mysqli_query($con,$get_questions);

    $list_questions = mysqli_fetch_array($fetch_exe);
    
    

}


?>

<style>
    #check{
        width:120px;
        height:35px;
        margin-top:10px;
        border:solid 1px black;
        background:none;
        border-radius:5px;
    }
</style>
    <div class="container">
<div class="head"> <h1>Question similarity Tool</h1></div>
<form action="" method="post">
        
    <div class="form-floating mb-3">
            
                        <input name="adminname" type="text" class="form-control w-100 " id="floatingInput" placeholder="Username">
                        <label for="floatingInput">Enter Question</label>
                        <input type="submit" value="check" name="check" id="check">
                        
        </div>
        </form>

        <style>
    .container1{
        width:100%;
        padding-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        row-gap: 20px;
    }

    .boxes{
        width: 700px;
        height: 60px;
        border: solid 1px black;
        border-radius: 8px;
        padding-top: 0;
        padding-bottom: 0;
        padding-right: 50px;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    

    .item,.percentage{
        display: flex;
        align-items: center;
        justify-content: center;
    }


</style>
    <div class="container1">
       
    <?php  if(isset($_POST['check'])){foreach($result as $item => $val): ?>
        <div class="boxes">
            <div class="item">
            <?php  echo $item; ?>
            </div>
      
            <div class="percentage">
                
                <?php 
                
                $val = round($val, 4)*100;
                
                echo $val.'%'; ?>
            </div>
        </div>
    <?php endforeach;}?>
    </div>
        </div>
    </body>
    </html>
