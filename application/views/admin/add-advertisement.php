<!-- Page Content  -->
<div id="content-page" class="content-page">

<div class="container-fluid">

<?php

/*  print_r($update['data2']); exit; */

$id=$ad_title=$shop_link=$description=$coupon_code=$image_url=$video_url=$label=$lbl_shop_link=$lbl_description=$lbl_id=$lbl_image_url=$lbl_video_url=$lbl_video_url=$lbl_title=$lbl_coupon_code=$image=$video=$coupon_details=$lbl_coupon_details=$video_duration=$video_closing_time="";
$filerequired="required";

if(isset($update))

{

 $id=$update['data'][0]->id;

 $lbl_id="ID";

 $ad_title=$update['data'][0]->title;

 $lbl_title="Title";

 $shop_link=$update['data'][0]->shop_link;

 $lbl_shop_link="Shop Link";

 $description=$update['data'][0]->description;

 $lbl_description="Description";

 $coupon_code=$update['data'][0]->coupon_code;

 $lbl_coupon_code="Coupon Code";

 $coupon_details=$update['data'][0]->coupon_details;

 $image_url=$update['data'][0]->image_url;

 $lbl_image_url="Change Image";
 $video_url=$update['data'][0]->video_url;
 $video_closing_time=$update['data'][0]->video_closing_time;
 $video_duration=$update['data'][0]->video_duration;
 

 $filerequired="";


 $title='Update Advertisement';

 $action='update_advertisement';

 $button='Update';

 $image="<img src='".base_url().'uploads/advertisement-images/'.$image_url."' width='150px' height='150px'>";

}

else

{

 $title='Add Advertisement';

 $action='add_advertisement';

 $button='Submit';

 $lbl_image_url="Choose Image";

}

?>

    <div class="row">

       

       <div class="col-lg-12">

           <div class="iq-card">

                <div class="iq-card-header d-flex justify-content-between">

                   <div class="iq-header-title">

                      <h4 class="card-title"><?php echo $title;?></h4>

                   </div>

                </div>

                <div class="iq-card-body">

                   

                   <form id="add_advertisement" method="POST" action="<?php echo $action;?>" data-form="ajaxform" enctype="multipart/form-data">

                      <div class="form-row">

                         <div class="col">

                         <label><?php echo $lbl_title;?></label>

                            <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo $ad_title;?>" required>

                         </div>

                         <div class="col">

                              <label>Width:390px,height:330px</label>

                        

                             <input type="file" class="custom-file-input" id="imgfile" name="image_url" <?php echo $filerequired ?> accept="image/*">

                            <label class="custom-file-label" for="customFile" style="margin-top: 7%;"><?php echo $lbl_image_url; ?></label>

                             <?php echo $image;?>

                         </div>
                         </div>
                         <div class="form-row pt-4">
                         <div class="col">
                         <label>Video URL</label>

                        <input type="text" class="form-control" placeholder="Embedded URL" name="video_url" value="<?php echo $video_url;?>" required>
                      
                        </div>
                        <div class="col">
                         <label>Video Closing Time(in minutes)</label>

                        <input type="text" class="form-control" placeholder="Video Closing Time" name="video_closing_time" value="<?php echo $video_closing_time;?>" required>
                      
                        </div>
                        <div class="col">
                         <label>Video Duration(in minutes)</label>

                        <input type="text" class="form-control" placeholder="Video Duration" name="video_duration" value="<?php echo $video_duration;?>" required>
                      
                        </div>

                        </div>
                      
                      <div class="form-row pt-4">
                      <div class="col">

                     <label>Description</label>

                     <textarea class="form-control" placeholder="" name="description" style="height:100px" required><?php echo $description;?></textarea>

                    </div>
                    
                      </div>
                      <div class="form-row pt-4">
                      <div class="col">

                        <label><?php echo $lbl_shop_link;?></label>

                        <input type="text" class="form-control" placeholder="Shop Link" name="shop_link" value="<?php echo $shop_link;?>" required>

                        </div>  
                        <div class="col">

                        <label><?php echo $lbl_coupon_code;?></label>

                        <input type="text" class="form-control" placeholder="Coupon Code" name="coupon_code" value="<?php echo $coupon_code;?>" required>

                        </div> 
                      </div>
                      <div class="form-row pt-4">
                      <div class="col">

                      <label>Coupon Details</label>

                     <textarea class="form-control" placeholder="" name="coupon_details" style="height:100px" required><?php echo $coupon_details;?></textarea>

                        </div>  
                      
                      </div>
                      

                    <div class="form-row" style="padding-top:50px;">

     

                  <div class="col">

                  <input type="hidden" name="status" value="Active">

                  <input type="hidden" name="id" value="<?php echo $id; ?>">

                  <input type="hidden" name="old_image" value="<?php echo $image_url;?>">
                  <input type="hidden" name="old_video" value="<?php echo $video_url;?>">

                              <button type="submit" class="btn btn-primary"><?php echo $button;?></button>

                    
                         </div>

                

                 

                      </div>                      

                   </form>

                </div>

             </div></div>

    </div>

    

    <div class="row">

       <div class="col-md-12">

          <div class="iq-card iq-card-block iq-card-stretch iq-card-height">

             <div class="iq-card-header d-flex justify-content-between">

                <div class="iq-header-title">

                   <h4 class="card-title">Advertisements</h4>

                </div>

              

             </div>

             <div class="iq-card-body">

                <div class="table-responsive">

                   <table class="table mb-0 table-borderless">

                     <thead>

                       <tr>

                         <th scope="col">#</th>

                         <th scope="col">Title</th>

                        <th scope="col">Shop Link</th>

                        <th scope="col">Description</th>

                        <th scope="col">Image</th>

                       </tr>

                     </thead>

                     

                     <tbody>

                     <?php 

                         $i=1;
                        if($advertisementlist)
                        {
                         foreach($advertisementlist as $detail)

                         {

                        ?>

                       <tr>

                         <td><?php echo $i;?><input type="hidden" id="id" name="id" value="<?php echo $detail->id;?>"></td>

                         <td><?php echo $detail->title;?></td>

                         <td><?php echo $detail->shop_link;?></td>
                         <td><?php echo $detail->description;?></td>
                         <td><img src="<?php echo base_url()?>uploads/advertisement-images/<?php echo $detail->image_url;?>" height="100px" width="100px"></td>
                 <td>

                 <span class="table-remove"><button type="button"

                               class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('admin/single-view/advertisement/'.$detail->id))?>">View</a></button></span>

                               <span class="table-remove"><button type="button"

                               class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('admin/update-advertisement/'.$detail->id))?>">Update</a></button></span>

                               <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="advertisement">

                               <input type="hidden" name="delid" class="delid" value="<?php echo $detail->id;?>"><button type="button"

                               class="btn iq-bg-danger btn-rounded btn-sm my-0 delete_item">Delete</button></span>

                               

                             
                         </td> 

                       </tr>

                       <?php $i++; }}else{?>
                        <tr><td>Advertisement List Not Available</td></tr>
                     <?php }?>

                

              

                     </tbody>

                   </table>

                 </div>

             </div>

          </div>

       </div>

       

    </div>

    

 </div>

</div>

