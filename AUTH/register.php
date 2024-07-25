<style>
.container-fluid{
    display: flex;
    align-items: center;
    justify-content: center;
}

    .login-container{
        width: 80%;
        padding: 30px;
        padding-top: 60px;
        height: 490px;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        border-radius:5px;
        /* display:flex; */
        align-items: center;
        justify-content: center;
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
        margin-left: 27%;
        
    }

    #floatingPassword{
        margin-bottom:15px;
    }

    input:focus{
       box-shadow: none;
    }
</style>


<div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow align-items-center justify-content-center">

                    <!-- Sidebar Toggle (Topbar) -->
                  

                       
                       <h1 style="color:rgba(0, 0, 0, 0.726)" class="text-center">Register...</h1>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid align-items-center justify-content-center">
                     
                <div class="login-container">

                <form action="" method="post">

                    <div class="form-floating mb-3">
                        <input name="adminname" type="text" class="form-control w-100 " id="floatingInput" placeholder="Username">
                        <label for="floatingInput">Username</label>
                      </div>
                    <div class="form-floating mb-3">
                        <input name="adminemail" type="email" class="form-control w-100 " id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                      </div>
                      <div class="form-floating">
                        <input name="adminpwd" type="password" class="form-control w-100" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                      </div>
                      <div class="form-floating">
                        <input name="admincpwd" type="password" class="form-control w-100" id="floatingPassword" placeholder="Confirm Password">
                        <label for="floatingPassword">Confirm Password</label>
                      </div>

                <input name="register" id="Login" type="submit" value="Register">
                </form>
                </div>
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            
            <!-- End of Footer -->

        </div>