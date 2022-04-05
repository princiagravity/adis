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

        <form id="user-registration" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data">
        <div class="container h-100 text-white">
            <div class="row h-100">
                <div class="col-12 align-self-center mb-4">
                    <div class="row justify-content-center">
                        <div class="col-11 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                            <h2 class="font-weight-normal mb-5">Create new<br>account with us</h2>
                            <div class="form-group float-label position-relative">
                                <input type="number" name="referrer_mobile" class="form-control text-white referrer_check" minlength="10" >
                                <span class="ref_span"></span>
                                <label class="form-control-label text-white">Referrer Mobile (Optional)</label>
                            </div>
                             <div class="form-group float-label position-relative">
                                <input type="text" name="display_name" class="form-control text-white" required >
                                <label class="form-control-label text-white">Name</label>
                            </div>
							  <div class="form-group float-label position-relative">
                                <input type="email" name="email_id" class="form-control text-white" required>
                                <label class="form-control-label text-white">Email</label>
                            </div>
                            <div class="form-group float-label position-relative">
                                <input type="number" name="mobile" class="form-control text-white " required>
                                <label class="form-control-label text-white">Mobile</label>
                            </div>
                            <div class="form-group float-label position-relative">
                            <select class="form-control" id="exampleFormControlSelect1" name="district" required>
                            <option value="" selected disabled></option>
                            <?php foreach($districtlist as $detail)
                                {

                                ?>

                                <option value="<?php echo $detail->id ?>"><?php echo $detail->name;?></option>
                                <?php
                                }
                                ?>



                            </select>
                                <label class="form-control-label text-white">District</label>
                            </div>
                            <div class="form-group float-label position-relative">
                            <select class="form-control" id="exampleFormControlSelect1" name="area" required>
                            <option value="" selected disabled></option>
                            <?php foreach($arealist as $detail)
                                {

                                ?>

                                <option value="<?php echo $detail->id ?>"><?php echo $detail->name;?></option>
                                <?php
                                }
                                ?>



                            </select>
                                <label class="form-control-label text-white">Area</label>
                            </div>
							
							 <div class="form-group float-label position-relative">
                                <textarea name="permanent_address" class="form-control text-white " required></textarea>
                                <label class="form-control-label text-white">Permanent Address</label>
                            </div>
							
							 <div class="form-group float-label position-relative">
                             <textarea name="correspondence_address" class="form-control text-white "></textarea>
                             <label class="form-control-label text-white">Correspondence Address</label>
                            </div>
                            <div class="form-group float-label position-relative">
                                <input name="password"  id="password" type="password" class="form-control text-white " required>
                                <label class="form-control-label text-white">Password</label>
                            </div>
                            <div class="form-group float-label position-relative">
                                <input type="password" id="confirm_password" class="form-control text-white ">
                                <span id="pass-error"></span>
                                <label class="form-control-label text-white">Confirm Password</label>
                            </div>
                            <div class="form-group float-label position-relative">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" required>
                                    <label class="custom-control-label" for="customSwitch1">I Agree with Terms &amp; Conditions</label>
                                </div>
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
        <input type="hidden" id="ref_stat" name="ref_stat" value="0">
        <button type="submit" class="btn btn-default rounded btn-block">Save & Next</button>
        </div>
    </div>
</div>
</form>