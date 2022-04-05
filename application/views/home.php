
        <div class="main-container">
            <!-- page content start -->

      
            <div class="container mb-4">
                <div class="card">
                    <div class="card-body text-center ">
                        <div class="row justify-content-equal no-gutters">
                          
						   <div class="col-4 col-md-2 mb-3">
						    <a href="<?php echo site_url("Under-Construction")?>">
                                <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">qr_code_2</span></div>
                                <p class="text-secondary"><small>App Registration</small></p>
                            </a>
							</div>
							
                            <div class="col-4 col-md-2 mb-3">
                                <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">swap_horiz</span></div>
                                <p class="text-secondary"><small><a href="<?php echo site_url("Under-Construction")?>">My Network</a></small></p>
                            </div>
                            <div class="col-4 col-md-2 mb-3">
                                <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">sim_card</span></div>
                                <p class="text-secondary"><small>Adis Browsing</small></p>
                            </div>
                           
                           
                        </div>
                      
                    </div>
                </div>
            </div>
          

            <!-- Swiper -->
            <div class="container mb-4">
                <!-- Swiper -->
                <div class="swiper-container offerslidetab1">
                    <div class="swiper-wrapper">
                        <?php 
                        if(isset($adlist)){
                        foreach($adlist as $detail)
                        {
                            ?>
                        <div class="swiper-slide">
                            <div class="card overflow-hidden">
                                <div class="background opacity-30">
                                    <img src="<?php echo base_url()?>uploads/advertisement-images/<?php echo $detail->image_url?>" alt="">
                                </div>
                                <div class="card-body text-white" style="padding-top:25%">
                                    <h3 class="font-weight-normal"><?php echo $detail->title;?></h3>
                                    <p class="text-mute"><?php echo $detail->description;?></p><br/>
									<br/>
                                    <div class="text-right"  style="padding-bottom:25%">
                                        <div class="row mb-4">
                    <div class="col-10">
                        <input type="hidden" name="closingtime" class="closingtime" value="<?php echo $detail->video_closing_time?>">
                        <input type="hidden" name="videoduration" class="videoduration" value="<?php echo $detail->video_duration?>">
                        <input type="hidden" name="adid" class="adid" value="<?php echo $detail->ad_id;?>">
                        <input type="hidden" name="videourl" class="videourl" value="<?php echo $detail->video_url?>">
                        <button class="btn btn-outline-default px-2 btn-block rounded vidplay" data-toggle="modal" data-target="#exampleModalCenter">
						<!--<span class="material-icons mr-1" style="display:block;text-align:center">qr_code_scanner</span> -->
						Play Ad Win Amazing Gifts</button>
                    </div>
                    
                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>
                       
                       
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination white-pagination text-left pl-2 mb-3"></div>
                </div>
            </div>
            <input type="hidden" id="adid" value="">
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close closevideo" data-dismiss="modal" aria-label="Close" style="display: none;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
        <div class="embed-responsive embed-responsive-16by9">
       <!--  <video control class="advideo embed-responsive-item">
        <source class="vidsrc" src="">
        Your browser does not support this video
        </video> -->
        <iframe width="100%" height="200" src="" title="YouTube video player" controls=0 class="advideo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      
        </div>
      </div>
      <div class="modal-footer">
     
      </div>
    </div>
  </div>
</div>



      </div>
   