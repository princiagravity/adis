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

        <form id="user-role-details" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
        <div class="container h-100 text-white">
            <div class="row h-100">
                <div class="col-12 align-self-center mb-4">
                    <div class="row justify-content-center">
                        <div class="col-11 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                            <h2 class="font-weight-normal mb-5"></h2>
                            <?php if(isset($role))
                            { if($role=='shop')
                            {?>
                             <div class="form-group float-label position-relative">
                                <input type="text" name="shop_name" class="form-control text-white" required >
                                <label class="form-control-label text-white">Shop Name</label>
                            </div>
							  <div class="form-group float-label position-relative">
                              <select class="form-control" id="exampleFormControlSelect1" name="shop_category" required>
                              <option value="" selected disabled></option>
                            <?php foreach($shopcategories as $detail)
                                {

                                ?>

                                <option value="<?php echo $detail->id ?>"><?php echo $detail->name;?></option>
                                <?php
                                }
                                ?>



                            </select>
                                <label class="form-control-label text-white">Choose Shop Category</label>
                            </div>
                            <?php } else if($role=='individual'){?>
                            <div class="form-group float-label position-relative">
                            <select class="form-control" id="exampleFormControlSelect1" name="job_category" required>
                            <option value="" selected disabled></option>
                            <?php foreach($jobcategories as $detail)
                                {

                                ?>

                                <option value="<?php echo $detail->id ?>"><?php echo $detail->name;?></option>
                                <?php
                                }
                                ?>



                            </select>
                                <label class="form-control-label text-white">Choose Job Category</label>
                            </div>
                            
							<?php }}?>
							
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
        <input type="hidden" name="status" value="active">
        <input type="hidden" name="role" value="<?php echo $role;?>">
        <button type="submit" class="btn btn-default rounded btn-block">Sign Up</button>
        </div>
    </div>
</div>
</form>