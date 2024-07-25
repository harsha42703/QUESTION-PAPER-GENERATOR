<style>
.container-fluid{
    display: flex;
    align-items: center;
    justify-content: center;
}

    .login-container{
        width: 80%;
        padding: 30px;
        padding-top: 100px;
        height: 400px;
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
                  

                       
                       <h1 style="color:rgba(0, 0, 0, 0.726)" class="text-center">Login...</h1>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid align-items-center justify-content-center">
                     
                <div class="login-container">

                <form action="" method="post">

                    <div class="form-floating mb-3">
                        <input name="login_email" type="email" class="form-control w-100 " id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                      </div>
                      <div class="form-floating">
                        <input name="login_pwd" type="password" class="form-control w-100" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                      </div>

                <input name="Login" id="Login" type="submit" value="Login">
                </form>
                </div>
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>