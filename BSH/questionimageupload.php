<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<style>
   *{
    margin: 0;
    padding: 0;
   }

    .container1{
        width:100%;
        height: auto;
        height: 100vh;
        background: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
        padding: 60px;
        padding-top: 100px;
        overflow-y:scroll;
    }
    .form-control:focus{

        box-shadow:none;
        border-color:black;
    }

    .special{
        width:100%;
        padding:60px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border-radius:8px;
    }

    input{
        background: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
        color:black;
    }

    .brd{
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border-radius:5px;
    }
</style>
<?php 
include('../includes/db.php');
if(isset($_GET['ques_id']))
{
    $ques_id = $_GET['ques_id'];
    // echo $ques_id;   
    $get_question = "SELECT * from questions where exaque_count=$ques_id";
    $query_exe = mysqli_query($con,$get_question);
    $data = mysqli_fetch_assoc($query_exe);
    $question= $data['que_desc'];

    $sub_id = $data['sub_id'];
   


}

if (isset($_POST['submit'])) {

    if (isset($_FILES["image"])){
        $imageName= $_FILES["image"]["name"];
        $imageTmpName = $_FILES["image"]["tmp_name"];
        

        $uploadDirectory = "questionimages/";
        $imagePath = $uploadDirectory . $imageName;

       
        
        $query = "UPDATE questions set  image_id='$imagePath' where exaque_count=$ques_id";
        $exe_query = mysqli_query($con,$query);
        if($exe_query){
            move_uploaded_file($imageTmpName, $imagePath);
            echo "<script>window.alert('Uploaded Succesfully')</script>";
            echo "<script>window.open('index.php?viewques&subj=$sub_id','_self')</script>";
        }
    }
}


?>
    
<div class="container1">

    <p class="text-center"><strong>Question:</strong> <?php echo $question;?> </p>
    <br><br><br>
    <div class="mb-3 special">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group">
  <input name="image" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
  <input class="btn brd" name="submit" type="submit" id="inputGroupFileAddon04" value="Upload">
</div>
        </form>
      </div>

</div>

</body>
</html>