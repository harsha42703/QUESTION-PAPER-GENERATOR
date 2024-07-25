<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        
            .container{
        width:100%;
        height: 100vh;
        overflow-y: scroll;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 10px;
        overflow-x: scroll;
        
    }

    .container::-webkit-scrollbar{
        display: none;
    }
    .head{
        color: black;
        font-size: 25px;
        padding: 10px;
        width:100%;
        display: flex;
        align-items: center;
        justify-content: space-around;
        padding-bottom:20px;
    }
    
.head a{
    font-size: 28px;
    color: black;
    text-decoration: none;
    
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;

}

.sortlist{
  width: 100%;
  padding: 30px;
  display: flex;
  align-items: center;
  justify-content: space-between;

}

.sortlist a{
  color: black;
  text-decoration: none;
}

.queupload,.queimage{
  text-decoration: none;
  color:black;
}

td,th,.clblack{
  color: black;
}


    
    </style>
    <?php 
    include('../includes/db.php');
    if(isset($_GET['subj'])){
      $subject_id = $_GET['subj'];

      $get_sub_name = "SELECT subject_name from subjects where subject_id=$subject_id";
      $get_sub_exe = mysqli_query($con,$get_sub_name);
      $subject_o = mysqli_fetch_assoc($get_sub_exe);

      $subject_name = $subject_o['subject_name'];
    }
    
    ?>
    <div class="container">
   <div class="head" ><p style=" font-size:20px; color:black; padding:8px; margin-top:7px; border-radius:7px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" ><?php echo "$subject_name" ; ?>   </p>
   <a style=" font-size:20px; color:black; padding:8px; border-radius:7px;" href="index.php?template&subject_id=<?php echo $subject_id?>">Generate Paper</a></div>

   <div class="sortlist">
    
  <a href="<?php echo "index.php?viewques&subj={$subject_id}&sortby=short";?>">Short questions <i class="fas fa-sort"></i></a>
  <a href="<?php echo "index.php?viewques&subj={$subject_id}&sortby=long";?>">Long Questions <i class="fas fa-sort"></i> </a>
  <a href="<?php echo "index.php?viewques&subj={$subject_id}&sortby=selfstudy";?>">Self Study <i class="fas fa-sort"></i></a>
  <a href="<?php echo "index.php?viewques&subj={$subject_id}";?>">Show All  <i class="fas fa-sort"></i></a>
  
  
  </div>
   
   <div class="data">
   <?php 

if(isset($_GET['subj']))
{
echo "<table class='table'>
<thead>
  <tr>
    <th scope='col'>S.NO</th>
    <th scope='col'>Question</th>
    <th  class='text-center ' scope='col'>Marks</th>
    <th class='text-center' scope='col'>Difficulty</th>
    <th class='text-center' scope='col'>Image</th>
    <th class='text-center' scope='col'>Edit</th>
  </tr>
</thead>
<tbody>";

}

?>


  <?php 
  

  if(isset($_GET['subj']))
{
  $sub_id= $_GET['subj'];

  if(isset($_GET['sortby'])){
    $sortby = $_GET['sortby'];
    if($sortby=='short')
    {
      $show_branches = "SELECT * FROM questions where sub_id=$sub_id and que_marks=2 and que_mode!=4";
    }
    else if($sortby=='long'){
      $show_branches = "SELECT * FROM questions where sub_id=$sub_id and que_marks!=2 and que_mode!=4";
    }
    else{
      $show_branches = "SELECT * FROM questions where sub_id=$sub_id  and que_mode=4";
    }
    
  }
  else{
    $show_branches = "SELECT * FROM questions where sub_id=$sub_id order by que_marks";
  }
 
  
  $branches_exe = mysqli_query($con,$show_branches);
  $s_no=1;
  while($row=mysqli_fetch_assoc($branches_exe))
  {
    $que_id = $row['exaque_count'];
    $mode = $row['que_mode'];
    if($mode==1){
      $diff = 'Easy';
    }
    else if($mode==2){
      $diff = 'Medium';
    }
    else{
      $diff = 'Hard';
    }

    $image_id = $row['image_id'];

    if(empty($image_id)){
      $image_data="<a class='queupload' href='questionimageupload.php?ques_id=$que_id'>Upload</a>";
    }
    else{
      $image_data ="<a class='queimage' href='viewquestionimage.php?ques_id=$que_id'><i class='fas fa-camera'></i></a>";
    }
   
      echo " <tr>
      <th  scope='row'>{$s_no}</th>
      <td>{$row['que_desc']}</td>
      <td class='text-center'>{$row['que_marks']}</td>
      <td class='text-center'>{$diff}</td>
      
      <td class='text-center'>$image_data</td>
      
      <td class='text-center clblack'><a class='clblack' href='editquestion.php?ques_id={$row['exaque_count']}'><i class='fas fa-edit'></i></a></td>
    </tr>";
  
    $s_no++;
  }
  echo "</tbody>
  </table>";
}




  ?>
   </div>
    </div>
    
</body>
</html>