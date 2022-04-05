<div class="main-container">
            <!-- page content start -->

      
              <!-- page content start -->
        <div class="container-fluid px-0">
            <div class="card overflow-hidden">
                <div class="card-body p-0 h-150" style="height: 75px">
                    <div class="background" style="background: #e78318;
    border-left: 1px solid #e8861b;">
                        <img src="img/image10.jpg" alt="" style="display: none;">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid top-70 text-center mb-4">
            <div class="avatar avatar-140 rounded-circle mx-auto shadow">
                <div class="background">
                    <img src="img/user1.png" alt="">
                </div>
            </div>
        </div>

        <div class="container mb-4 text-center text-white">
            <h6 class="mb-1"><?php echo $profile_details->display_name;?></h6>
          
            <p class="mb-1">Email : <?php echo $profile_details->email_id;?></p>
            <p>Phone : +<?php echo $profile_details->mobile;?></p>
        </div>

        <div class="main-container">
            
            <div class="container mb-4">
                <div class="card" style="padding:30px">
                  <h6> Name :  <?php echo $profile_details->display_name;?></h6>  
 <h6>Phone Number : <?php echo $profile_details->mobile;?> </h6>
 <h6>Email ID :  <?php echo $profile_details->email_id;?></h6>
 <h6>Permanent Address :  <p><?php echo $profile_details->permanent_address;?></p></h6>
 <h6>Correspondence Address :  <p><?php echo $profile_details->correspondence_address;?></p></h6>
 <?php if(in_array($_SESSION['userdata']['role'],array('individual','shop')))
			{?>
                <h6>Total Referrals  :  <?php echo $ref_count; ?></h6>
                    <?php
                    if($referral_list)
                    {
                     ?>
                     <h6>Referrals  :  <p class="p-3"><?php foreach($referral_list as $detail){
                        ?> <span class="bg-primary text-white ml-2 p-2 mt-2 rounded"><?php echo $detail->display_name."  ";?></span><?php
                     } ?></p></h6>
                     <?php   
                    }
            }?>
			   </div>
            </div>
          
        
	   </div>
   




      </div>