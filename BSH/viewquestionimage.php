<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        /* padding: 60px;
        padding-top: 100px;
        overflow-y:scroll; */

        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;

    }

    .container1 img{
        width:500px;
        height:300px;
        padding: 30px;
        border-radius: 7px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .container1 a{

        color: black;
        text-decoration: none;
        padding: 8px;
        border-radius: 7px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        margin-top: 10px;
        font-size: 18px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

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
    $image_id= $data['image_id'];

    // $sub_id = $data['sub_id'];
   


}


?>


<div class="container1">


    <img src="<?php echo $image_id;?>" alt="">

    <a href='<?php echo $image_id;?>' download>Download</a>

</div>
    
</body>
</html>