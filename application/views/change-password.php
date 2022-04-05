 <!-- Begin page content -->
 <main class="flex-shrink-0 main has-footer">
        <!-- Fixed navbar -->
        <header class="header">
            <div class="row">
                <div class="col-auto px-0">
                    <button class="menu-btn btn btn-40 btn-link back-btn" type="button">
                        <span class="material-icons">keyboard_arrow_left</span>
                    </button>
                </div>
                <div class="text-left col align-self-center">
                   
                </div>
                <div class="ml-auto col-auto align-self-center">
                    <a href="login.html" class="text-white">
                        Sign in
                    </a>
                </div>
            </div>
        </header>
        
        <form id="update-password" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
        <div class="container h-100 text-white">
            <div class="row h-100">
                <div class="col-12 align-self-center mb-4">
                    <div class="row justify-content-center">
                        <div class="col-11 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                            <h2 class="font-weight-normal mb-5">Change<br>your password</h2>
                            <div class="form-group float-label position-relative active">

                            <input class="form-control" type="text" name="otp" id="otp" placeholder="Enter 8 digit security code" required>
                            <label class="form-control-label text-white">OTP</label>
                            </div>
                            <div class="form-group float-label position-relative active">
                                <input type="password" class="form-control text-white" id="password" name="password" required>
                                <label class="form-control-label text-white">Password</label>
                            </div>  
                            <div class="form-group float-label position-relative">
                                <input type="password" class="form-control text-white" id="conf_pass" name="confirmpassword" required>
                                <span class="pass-error"></span>
                                <label class="form-control-label text-white">Confirm Password</label>
                            </div>  
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </main>

    <!-- footer-->
    <div class="footer no-bg-shadow py-3">
        <div class="row justify-content-center">
            <div class="col">
                <button type="submit" class="btn btn-default rounded btn-block">Chnage Password</button>
            </div>
        </div>
    </div>
    </form>
