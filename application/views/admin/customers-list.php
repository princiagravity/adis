
      <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title"><?php echo $title;?></h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-6">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    <form class="mr-3 position-relative">
                                       <div class="form-group mb-0">
                                          <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                               <!--   <div class="user-list-files d-flex float-right">
                                    <a href="javascript:void();" class="chat-icon-phone">
                                       Print
                                     </a>
                                    <a href="javascript:void();" class="chat-icon-video">
                                       Excel
                                     </a>
                                     <a href="javascript:void();" class="chat-icon-delete">
                                       Pdf
                                     </a>
                                   </div> -->
                              </div>
                           </div>
                           <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Area</th>
									         <th>District</th>
                                   <!--  <th>No of Orders </th>
                                   
                                    <th>Join Date</th> -->
                                    <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                <?php if($customers_list)
                                {
                                   foreach($customers_list as $detail)
                                   {
                                   ?>
                                 <tr>
                                    <td class="text-center"><img class="rounded-circle img-fluid avatar-40" src="<?php echo base_url()?>images/admin/user/01.jpg" alt="profile"></td>
                                    <td><?php echo $detail->display_name;?></td>
                                    <td><?php echo '+'.$detail->mobile?></td>
                                    <td><?php echo $detail->email_id;?></td>
                                    <td><?php echo $detail->area_name?></td>
									         <td><?php echo $detail->district_name?></td>
                                    <!-- <td><?php echo $detail->no_of_orders;?></td>
                                    
                                    <td><?php echo $detail->date_of_joining;?></td> -->
                                    <td>
                                       <div class="flex align-items-center">
                                         <a data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="<?php echo site_url('admin/customer-profile/'.$detail->user_id)?>" class="btn btn-primary">View</a>
                                         <?php if($detail->status =='pending'){?>
                                          <input type="hidden" class="userid" name="user" value="<?php echo $detail->user_id;?>">
                                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="" class="btn btn-success approve_user">Approve</a>
                                          <?php }?>
                                         
                                       </div>
                                    </td>
                                 </tr> 
                                 <?php } }
                                 else
                                 {
                                    ?>
                                    <tr><td colspan="9">Customers List Not Available</td></tr>
                                    <?php
                                 }?>
                             </tbody>
                           </table>
                        </div>
                           <!-- <div class="row justify-content-between mt-3">
                              <div id="user-list-page-info" class="col-md-6">
                                 <span>Showing 1 to 5 of 5 entries</span>
                              </div>
                              <div class="col-md-6">
                                 <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end mb-0">
                                       <li class="page-item disabled">
                                          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                       </li>
                                       <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                       <li class="page-item"><a class="page-link" href="#">2</a></li>
                                       <li class="page-item"><a class="page-link" href="#">3</a></li>
                                       <li class="page-item">
                                          <a class="page-link" href="#">Next</a>
                                       </li>
                                    </ul>
                                 </nav>
                              </div>
                           </div> -->
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
    