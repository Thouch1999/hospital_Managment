 <div class="content">
   <div class="row">
     <div class="col-sm-8 col-6">
       <h4 class="page-title">Taxes</h4>
     </div>
     <div class="col-sm-4 col-6 text-right m-b-30">
       <a href="index.php?p_account=add_tax" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Tax</a>
     </div>
   </div>
   <div class="row">
     <div class="col-md-12">
       <div class="table-responsive">
         <table class="table table-striped custom-table mb-0">
           <thead>
             <tr>
               <th>#</th>
               <th>Tax Name </th>
               <th>Tax Percentage (%) </th>
               <th>Status</th>
               <th class="text-right">Action</th>
             </tr>
           </thead>
           <tbody>
             <tr>
               <td>1</td>
               <td>VAT</td>
               <td>14%</td>
               <td>
                 <div class="dropdown action-label">
                   <a class="custom-badge status-red dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                     Inactive
                   </a>
                   <div class="dropdown-menu">
                     <a class="dropdown-item" href="#">Active</a>
                     <a class="dropdown-item" href="#">Inactive</a>
                   </div>
                 </div>
               </td>
               <td class="text-right">
                 <div class="dropdown dropdown-action">
                   <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                   <div class="dropdown-menu dropdown-menu-right">
                     <a class="dropdown-item" href="index.php?p_account=edit_tax"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                     <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_tax"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                   </div>
                 </div>
               </td>
             </tr>
             <tr>
               <td>2</td>
               <td>GST</td>
               <td>30%</td>
               <td>
                 <div class="dropdown action-label">
                   <a class="custom-badge status-green dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                     Active
                   </a>
                   <div class="dropdown-menu">
                     <a class="dropdown-item" href="#">Active</a>
                     <a class="dropdown-item" href="#">Inactive</a>
                   </div>
                 </div>
               </td>
               <td class="text-right">
                 <div class="dropdown dropdown-action">
                   <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                   <div class="dropdown-menu dropdown-menu-right">
                     <a class="dropdown-item" href="edit-tax.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                     <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_tax"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                   </div>
                 </div>
               </td>
             </tr>
           </tbody>
         </table>
       </div>
     </div>
   </div>
 </div>