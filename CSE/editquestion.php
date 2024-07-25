<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
if(isset($_GET['ques_id']))
{
    $ques_id = $_GET['ques_id'];
    echo $ques_id;
}


?>
    
</body>
</html>