    <!-- Page Content  -->
    <div id="content-page" class="content-page">
      <div class="container-fluid">
      <?php 
         
         $name=$id=$user_id=$email_id=$correspondence_address= $permanent_address=$mob_no=$area_name=$district_name=$created_by=$role="";
         foreach($customer_details as $details)
         {
           $name=$details->display_name;
           $id=$details->id;
           $user_id=$details->user_id;
          /*  $username=$details->username; */
           $email_id=$details->email_id;
           $correspondence_address=$details->correspondence_address;
           $permanent_address	=$details->permanent_address;
           $area_name=$details->area_name;
           $district_name=$details->district_name;
           $mob_no=$details->mobile;
           $role=$details->role;
         }?>
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title"><?php echo $name; ?></h4>
                        </div>
                     </div>
         
        <!-- User Information-->
        <div class="card user-info-card mb-3">
          <div class="card-body d-flex align-items-center">
		   <div class="text-center px-4"><img class="login-intro-img" src="<?php echo base_url()?>" alt=""></div>
           
           
          </div>
        </div>
        <?php if($role !="free"){?>
        <div class="card">
          <div class="card-body direction-rtl">
            <div class="row">
              <div class="col-12">
                <!-- Single Counter -->
                <div class="single-counter-wrap text-center"><i class="bi bi-heart-fill mb-2 text-danger"></i>
                  <h4 class="mb-1 text-success"><span class="counter"><?php echo $ref_count;?></span></h4>
                  <p class="mb-0">Total Referrals</p>
                </div>
              </div>
            <!--   <div class="col-6">-->
                <!-- Single Counter -->
                <!--<div class="single-counter-wrap text-center"><i class="bi bi-cup-fill mb-2 text-warning"></i>
                  <h4 class="mb-1 text-warning"><span class="counter"><?php echo 0;?></span></h4>
                  <p class="mb-0">Level Achieved</p>
                </div>
              </div> -->
           
            </div>
          </div>
        </div>
        <?php }?>
    
	  <div class="pt-3"></div>
        <!-- User Meta Data-->
        <div class="card user-data-card">
          <div class="card-body">
          <form id="update_profile" method="POST" action="" data-form="ajaxform" enctype="multipart/form-data" class="cart-form">
             
              <div class="form-group mb-3">
                <label class="form-label" for="fullname">Full Name</label>
                <input class="form-control" id="fullname" type="text" placeholder="Full Name" readonly value="<?php echo $name;?>">
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="email">Email Address</label>
                <input class="form-control" id="email" type="text"  placeholder="Email Address" readonly value="<?php echo $email_id;?>">
              </div>

              <div class="form-group mb-3">
                <label class="form-label" for="email">Mobile No</label>
                <input class="form-control" id="email" type="text"  placeholder="Mobile no" readonly value="<?php echo $mob_no;?>">
              </div>
           
              <div class="form-group mb-3">
                <label class="form-label" for="address">Correspondence Address</label>
                <input class="form-control" id="address" type="text" placeholder="Address" value="<?php echo $correspondence_address;?>">
              </div>

              <div class="form-group mb-3">
                <label class="form-label" for="address">Permanent Address</label>
                <input class="form-control" id="address" type="text" placeholder="Address" value="<?php echo $permanent_address;?>">
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="address">Area</label>
                <input class="form-control" id="area_id" type="text" placeholder="Area" value="<?php echo $area_name;?>">
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="address">District</label>
                <input class="form-control" id="district_id" type="text" placeholder="District" value="<?php echo $district_name;?>">
              </div>
            
             <!--  <div class="form-group mb-3">
                <label class="form-label" for="bio">Bio</label>
                <textarea class="form-control" id="bio" name="bio" cols="30" rows="10" placeholder="Working as UX/UI Designer at Team Gravity since 2016."></textarea>
              </div> -->
             
              <div class="rows">
              <div class="col text-right">
              <a class="btn btn-primary" href="<?php echo site_url("admin/$role-list/")?>" >Back</a>
              </div>
             
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>