<?php include '../connection.php'; ?>
					   
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Download File</title>
<!------ Include the above in your HEAD tag ---------->

<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">


<style>
        .pagination>li {
        display: inline;
        padding:0px !important;
        margin:0px !important;
        border:none !important;
        }
        .modal-backdrop {
          z-index: -1 !important;
        }
        /*
        Fix to show in full screen demo
        */
        iframe
        {
            height:700px !important;
        }
        
        .btn {
        display: inline-block;
        padding: 6px 12px !important;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
        }
        
        .btn-primary {
        color: #fff !important;
        background: #428bca !important;
        border-color: #357ebd !important;
        box-shadow:none !important;
        }
        .btn-danger {
        color: #fff !important;
        background: #d9534f !important;
        border-color: #d9534f !important;
        box-shadow:none !important;
        }
</style>

</head>
<body>
<div class="container">
    <div class="row">
            <div class="col-lg-12">
                <img src="https://www.mindcypress.com/assets/images/common/mindcypress-new-logo.png" class="img-responsive center-block d-block mx-auto" alt="Sample Image">
                <h2 class="text-center">Download File</h2>
            </div>
        
		
	</div>
    
        <div class="row">
		
            <div class="col-md-12">
            
            
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    				<thead>
						<tr>
							<th>#</th>
							<th>File Name</th>
							<th>Upload Date</th>
                            <th>Download</th>
                            <th>Delete</th>
						</tr>
					</thead>

					<tfoot>
						<tr>
							<th>#</th>
							<th>File Name</th>
                            <th>Upload Date</th>
                            <th>Download</th>
                            <th>Delete</th>
						</tr>
					</tfoot>

					<tbody>
					   
					   <?php 
					    $lk='1';
					        $result=$conn->query("SELECT * FROM general_file ORDER BY fid DESC");
					        if($result->num_rows > 0) 
					        {
					            
					            while($row=$result->fetch_assoc()) 
					              {
					                  
					                  $date=date_create_from_format("Y-m-d h:i:s",$row['upload_date']);
                                        $dates= date_format($date,"d-m-Y");
					   ?>
					    
						<tr id="<?= $row['file'];?>">
							<td><?= $lk++;?></td>
							<td><?= $row['file'];?></td>
							<td><?= $dates;?></td>
                            <td><a href="file/<?= $row['file'];?>" download="file/<?= $row['file'];?>"  class="btn"><span class="glyphicon glyphicon-cloud-download" style="font-size:30px;"></span></a> </p></td>
                            <!--<td> <a class="btn btn-danger" href="delete.php?id=<?= $row['fid'];?>" onclick="return confirm('Are you sure?')">-->
                            <!--                            <i class="icon-trash"></i> Delete </a></td>-->
                            
                            <td> 
                            <a class="btn btn-danger remove-record" href="#"> <i class="icon-trash"></i> Delete </a>
                            </td>
                            
						</tr>
						
						<?php } } else { echo'<tr> <td colspan="3" style="text-align: center;color: red;font-size: 20px;">File Not Found!</td> </tr>'; } ?>
                         
					</tbody>
				</table>

	<script type="text/javascript">
        $(".remove-record").click(function(){
            var file = $(this).parents("tr").attr("id");
            if(confirm('Are you sure to delete this record ?')) {
                $.ajax({
                    url: 'delete.php',
                    type: 'GET',
                    data: {file: file},
                    error: function() {
                      alert('Something is wrong, couldn\'t delete record');
                    },
                    success: function(data) {
                        $("#" + file).remove();
                        
                        setTimeout(function () {
                            alert("Record delete successfully."); 
                            location.reload(true);
                          }, 2000);
                        
                         
                    }
                });
            }
        });
    </script>
	</div>
	</div>
</div>

   
    </body>