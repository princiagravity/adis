
      <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
      <?php 
       $id=$name=$lbl_name="";
       
       if(isset($update))
       {/*  print_r($update); */
         $id=$update['data'][0]->id;
         $lbl_id="ID";
         $name=$update['data'][0]->name;
         $lbl_name="Name";
         $title='Update Job Categories';
         $action='update_category';
         $button='Update';
       }
       else
       {
         $title='Add Job Categories';
         $action='add_category';
         $button='Submit';
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
                        <div class="new-user-info">
                        <form id="add_category" method="POST" action="<?php echo $action;?>" data-form="ajaxform" enctype="multipart/form-data">
                              <div class="form-row">
                                 <div class="col">
                                    <label for="fname">Category</label>
                                    <input type="text" class="form-control" id="fname" placeholder="Category Name" value="<?php echo $name;?>" required name="name">
                                 </div>
                             
                             
                              <div class="col">
                                 <input type="hidden" name="status" value="Active">
                                 <input type="hidden" name="type" value="job">
                                 <input type="hidden" name="id" value="<?php echo $id; ?>">
                              
                              <button type="submit" class="btn btn-primary mt-5"><?php echo $button;?></button>
                              </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
         <div class="row">
               <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Job Categories</h4>
                        </div>
                      
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive ">
                           <table class="table mb-0 table-borderless">
                             <thead>
                               <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Category</th>
								        
                               </tr>
                             </thead>
                             <tbody>
                             <?php 
                                 $i=1;
                                 if($categorylist)
                                 {
                                 foreach($categorylist as $details)
                                 {
                                ?>
                               <tr>
                                 <td><?php echo $i;?><input type="hidden" id="id" name="id" value="<?php echo $details->id;?>"></td>
                                 <td><?php echo $details->name;?></td>
                                
                               
								          <td>
                                 <!--   <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('admin/single-view/category/'.$details->id))?>">View</a></button></span> -->
                                       <span class="table-remove"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0"><a href="<?php echo site_url(('admin/update-job-category/'.$details->id))?>">Update</a></button></span>
                                       <span class="table-remove"><input type="hidden" name="deltype" class="deltype" value="job-category">
                                       <input type="hidden" name="delid" class="delid" value="<?php echo $details->id;?>"><button type="button"
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0 delete_item">Delete</button></span>
                                 </td> 
                                
                               </tr>
                               <?php $i++; }}
                               else{?>
                               <tr><td>Job Category List Not Available</td></tr>
                               <?php
                               }?>
							   
						
                             </tbody>
                           </table>
                         </div>
                     </div>
                  </div>
               </div>
               
            </div>
      </div>
   </div>
   </div>
   <!-- Wrapper END -->
    <!-- Footer -->
      <footer class="bg-white iq-footer">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">
                  <ul class="list-inline mb-0">
                     <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                     <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                  </ul>
               </div>
               <div class="col-lg-6 text-right">
                  Copyright 2021 <a href="#">Team Gravity</a> All Rights Reserved.
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer END -->
