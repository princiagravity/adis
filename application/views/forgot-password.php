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
                        Sign In
                    </a>
                </div>
            </div>
        </header>
        
        <form id="forgot-password" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
        <div class="container h-100 text-white">
            <div class="row h-100">
                <div class="col-12 align-self-center mb-4">
                    <div class="row justify-content-center">
                        <div class="col-11 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                            <h2 class="font-weight-normal mb-3">Forgot<br>your password?</h2>
                            <p class="mb-5">Provide your registered email address to change password.</p>
                            <div class="form-group float-label active">
                                <input type="text" class="form-control text-white" name="email_id" required>
                                <label class="form-control-label text-white">Email ID</label>
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
                <button type="submit" class="btn btn-default rounded btn-block">Reset Password</button>
            </div>
        </div>
    </div>
    </form>
