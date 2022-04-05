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
                    <a href="<?php echo site_url('user-registration')?>" class="text-white">
                        Sign Up
                    </a>
                </div>
            </div>
        </header>

        <form id="user-login" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
        <div class="container h-100 text-white">
            <div class="row h-100">
                <div class="col-12 align-self-center mb-4">
                    <div class="row justify-content-center">
                        <div class="col-11 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                            <h2 class="font-weight-normal mb-5">Login into<br>your account</h2>
                            <div class="form-group float-label active">
                                <input type="text" class="form-control text-white" name="username" required>
                                <label class="form-control-label text-white">Mobile No/Email</label>
                            </div>
                            <div class="form-group float-label position-relative">
                                <input type="password" class="form-control text-white" name="password" required>
                                <label class="form-control-label text-white">Password</label>
                            </div>  
                            <p class="text-right"><a href="<?php echo site_url('forgot-password');?>" class="text-white">Forgot Password?</a></p>
                            <p class="mb-0">Didn't have an account? <a class="text-white" href="<?php echo site_url('user-registration')?>" >Register Now</a></p>
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
                <button type="submit" class="btn btn-default rounded btn-block">Login</button>
            </div>
        </div>
    </div>
    </form>

