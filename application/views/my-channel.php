
        <div class="main-container">
            <!-- page content start -->

      
            <div class="container">
            <?php foreach($videolist as $detail){?>
                <div class="row">
                 
                    <div class="col col-md-12">
                        <div class="card border-0 mb-4 overflow-hidden">
<iframe width="100%" height="200" src="<?php echo $detail->video_url?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                  
                    
                  
                   
                 
                </div>
                <?php }?>
                <div class="row text-center">
                    <div class="col-6 col-md-4 col-lg-3 mx-auto">
                        <button class="btn btn-sm btn-outline-secondary rounded" style="background:#000"><a href="https://www.youtube.com">Load More...</a></button>
                    </div>
                </div>
            </div>
       

      </div>