<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    .container{
        
        padding:40px;
        padding-top:100px;
    }

    .form-floating{
        margin-bottom:15px;
    }
    .form-control:focus {
  border-color: black;
  box-shadow: none;
}
#Login{
        width: 300px;
        padding: 8px;
        border: none;
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        font-size: 19px;
        margin-top: 30px;
        border-radius: 6px;
        cursor: pointer;
        margin-left: 29%;
        
    }
</style>

<?php  
 include('includes/db.php');
if(isset($_POST['change'])) 
{

  $old_pwd = $_POST['adminpwd'];
  $new_pwd = $_POST['newpwd'];
  $c_pwd = $_POST['cpwd'];

  $fetch_pwd = "SELECT * FROM ADMINS where admin_email='$admin_email' and admin_password='$old_pwd'";
  $fetch_pwd_exe = mysqli_query($con,$fetch_pwd);
  if(mysqli_num_rows($fetch_pwd_exe)>0)
  {
    if($new_pwd==$c_pwd)
    {
      $update_pwd = "UPDATE ADMINS SET admin_password='$new_pwd' where admin_email='$admin_email'";
      $update_exe = mysqli_query($con,$update_pwd);
      if(  $update_exe)
      {
        echo "<script>window.alert('Passowrd Changed Succesfully ')</script>";
      }
    }
    else{
      echo "<script>window.alert('Passwords does not match')</script>";
    }
  }
  else{
    echo "<script>window.alert('Incorrect Old Password')</script>";
  }

}


?>

<div class="container">
                     
<h1 class="text-center mb-5">Change Password</h1>
                

                <form action="" method="post">

                <div class="form-floating">
                        <input name="adminpwd" type="password" class="form-control w-100" id="floatingPassword" placeholder="Old Password">
                        <label for="floatingPassword">Old Password</label>
                      </div>
                    
                      <div class="form-floating">
                        <input name="newpwd" type="password" class="form-control w-100" id="floatingPassword" placeholder="New Password">
                        <label for="floatingPassword">New Password</label>
                      </div>
                      <div class="form-floating">
                        <input name="cpwd" type="password" class="form-control w-100" id="floatingPassword" placeholder="Confirm Password">
                        <label for="floatingPassword">Confirm Password</label>
                      </div>

                <input name="change" id="Login" type="submit" value="Change Password">
                </form>
             
                    
                </div>