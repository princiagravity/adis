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
                    <a href="<?php echo site_url('login')?>" class="text-white">
                        Sign In
                    </a>
                </div>
            </div>
        </header>

        <form id="user-type" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
        <div class="container h-100 text-white">
            <div class="row h-100">
                <div class="col-12 align-self-center mb-4">
                    <div class="row justify-content-center">
                        <div class="col-11 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                            <h2 class="font-weight-normal mb-5">Choose What type of User You are</h2>
                             <div class="form-group float-label position-relative">
                                <input type="radio" name="role" value="free" checked class="form-control text-white" required>
                                <label class="form-control-label text-white">Free User</label>
                            </div>
							
                            <div class="form-group float-label position-relative">
                                <input type="radio" name="role" value="individual" class="form-control text-white">
                                <label class="form-control-label text-white">Individual</label>
                            </div>

                            <div class="form-group float-label position-relative">
                                <input type="radio" name="role" value="shop" class="form-control text-white">
                                <label class="form-control-label text-white">Shop</label>
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
            <input type="hidden" name="status" value="inactive">
            <button type="submit" class="btn btn-default rounded btn-block">Submit</button>
        </div>
    </div>
</div>
</form>