<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url() ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
   <link href="<?php echo base_url() ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url() ?>/assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- custome css -->
    <link href="<?php echo base_url() ?>/assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <div class="row" >  
        <div class="col-md-10 col-md-offset-1">
<div class="caption" style="text-decoration: none;cursor: default;">
    <h1 class="text-center text-capitalize">User list
 <img src="<?php echo base_url('assets/images/loading.gif'); ?>"  id="loader1" /> </h1>
</div>  
 <table id="ajax_datatable" class="table table-striped users-list">
                    <thead> 
                        <tr class="tableheader tableheader-blue" >
                               <th>Name</th>
                               <th>Email</th>
                               <th>Status</th>
                               <th>Created</th>
                               <th>Last Login</th>
                               <th class="actions" >Actions</th>
                        </tr>
                    </thead>
                </table>
                </section><!-- /.content -->
<br/>
<div class="text-capitalize text-center"> <?php echo anchor('Welcome', 'Back','class= "btn btn-default"'); ?></div>
        </div></div>
 <script src="<?php echo base_url('assets/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery/jquery.dataTables.min.js'); ?>"></script>

<script>
$(document).ready(function(){
   
       ajax_datatable = $('table#ajax_datatable').dataTable({
            "bServerSide": true,
            "sAjaxSource": "<?php echo site_url('User/get_user_list'); ?>",
            "sPaginationType": "full_numbers",
            "fnServerData": function(sSource,aoData,fnCallback)
            {
                $('#loader1').show();
                $.ajax({
                    "dataType": 'json', 
                    "type": "POST", 
                    "url": sSource, 
                    "data": aoData, 
                    "success": fnCallback
                });
            },
            "fnDrawCallback" : function() {
              $('#loader1').fadeOut();
             },
            
              
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            var links="";
            
            links += '<a href="#" data-user_id="'+aData[5]+'" title="View Details" class="btn btn-primary btn-xs view_user" style="margin-right:5px;" ><span style="margin:5px" class="glyphicon glyphicon-search"></span></a>';  
            links +='<a href="#" data-user_id="'+aData[5]+'" title="Disable"class="btn btn-warning btn-xs disable_user" style="margin-right:5px;"><span style="margin:5px" class="fa  fa-user"></sapn>';
           
            $('td:eq(5)', nRow).html( links);
            
            
            
            var dateSplit = aData[3].split("-");            
            day = dateSplit[2].split(' ');
            var curr_date = day[0];
            var curr_month = dateSplit[1]; //Months are zero based
            var curr_year = dateSplit[0];
            $('td:eq(3)', nRow).html(curr_month + "-" + curr_date + "-" + curr_year );
		
             var dateSplit = aData[4].split("-");            
            day = dateSplit[2].split(' ');
            var curr_date = day[0];
            var curr_month = dateSplit[1]; //Months are zero based
            var curr_year = dateSplit[0];
            $('td:eq(4)', nRow).html(curr_month + "-" + curr_date + "-" + curr_year );    
            
            return nRow;
		},
        aoColumnDefs: [
          {
             bSortable: false,
             aTargets: [5]
          },
         
         
          {
             bSearchable: false,
             aTargets: [5]
          }
        ]
    });  
    
    });
  //function for view user details
</script>
