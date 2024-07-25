<?php

include('includes/db.php');


if(isset($_GET['editbranch'])){
    $branch_id = $_GET['editbranch'];
    $get_branch = "SELECT * from branches where branch_id = $branch_id";
    $fetch_branches = mysqli_query($con,$get_branch);
    $branch_data = mysqli_fetch_assoc($fetch_branches);
    $branch_name = $branch_data['branch_name'];
    $branch_code = $branch_data['branch_code'];

}
if(isset($_POST['edit']))
{
    $branch_name = $_POST['bname'];
    $branch_code = $_POST['bcode'];
 
    
        $edit_branch = "UPDATE branches set branch_code='$branch_code' , branch_name='$branch_name' where branch_id = $branch_id";
        $edit_exe = mysqli_query($con,$edit_branch);
        if($edit_exe)
        {
            echo "<script>window.alert('Branch Updated succesfully')</script>";
            echo "<script>window.open('index.php?branches','_self')</script>";
        }
    
        

}

?>



<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>


<style>
.head{
    text-align: center;
}
.container{
    width: 100%;
   height: 100vh;
   display: flex;
  flex-direction: column;
  row-gap: 30px;
   align-items: center;
   justify-content: center;

}

input{
    border: solid 1px black;
}
.form-control:focus {
  border-color: black;
  box-shadow: none;
}

#view{
    color: black;
    text-decoration: none;
}
</style>


<div class="container">
<h2 class="head">EDIT BRANCH</h2>
        <form method="post" action="">
            
              <div class="input-group">
              
  <input type="text" name="bname" placeholder="Branch Name" aria-label="First name" class="form-control border-black" value="<?php echo $branch_name;?>" >
  <input type="text" name="bcode" placeholder="Branch Code" class="form-control border-black" value="<?php echo $branch_code;?>">
  <button name="edit" class="btn btn-outline-secondary" type="submit" id="button-addon1">EDIT</button>
</div>
        </form>

        <a id='view' href="index.php?branches">View Branches</a>

</div>