<?php 
# Set page title 
$page_title = 'ManagePlayers' ; #Page title
session_start();

#If the user attempting to access the page is not a admin redirect to the indexLog page.
if( $_SESSION['usertype'] == '0' )
{	
	header('Location: ../indexLog.php');
}
?>

<html> <!-- HTML begins -->

 <head> <!-- Head begins -->
 
  <!-- Icon for the website -->
  <link rel="icon" href="../images/crest.png">
  
  <!-- Makes the page scale to different devices -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Required scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
    
 </head> <!-- End of head -->
 
 <body> <!-- Bodu begins -->
 
  <div class="container"> <!-- Bootstrap container begins --> 
  <br/>

   <div class="panel panel-default">
   
   <!-- Placed above table contains table title -->
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-6">
       <h3 class="panel-title">User Data</h3>
      </div>
	  <!-- Button to allow admins to add data -->
      <div class="col-md-6" align="right">
       <button type="button" name="add_data" id="add_data" class="btn btn-success btn-xs">Add</button>
      </div>
     </div>
    </div>
	
    <div class="panel-body">
		<div class="table-responsive">
			<span id="form_response"></span>
	  
	  <!-- Table headings to be filled with information from database -->
      <table id="user_data" class="table table-bordered table-striped">
       <thead>
        <tr>
         <td>Name</td>
         <td>username</td>
         <td>Age</td>
		 <td>Gender</td>
		 <td>Address</td>
		 <td>Phone</td>
		 <td>Email</td>
         <td>Edit</td>
         <td>Delete</td>
        </tr>
       </thead>
      </table> <!-- End of table --> 	  
     </div>
    </div>
   </div> <!-- End of panel -->
   
   <!-- Link back to home page -->
   <a href="../indexLog.php"><button type="button" class="btn btn-primary">Back</button></a>
   
  </div> <!-- End of bootstrap container -->
  
 </body> <!-- End of body -->
 
</html> <!-- End of html -->

<!-- The following script provides the functionality for the table -->
<!-- It is what allows the admins the make changes/ insert / delete information -->
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 <!-- Populates the table with information from the database -->
 var dataTable = $('#user_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetch.php",
   type:"POST"
  }, 
  <!-- Stops certain columns from being orderable -->
  "columnDefs":[
   {
    "targets":[0,7,8],
    "orderable":false,
   },
  ],

 });

 <!-- Function for adding information to the database -->
 $('#add_data').click(function(){
  var options = {
   ajaxPrefix:''
  };
  new Dialogify('add_data_form.php', options)
   .title('Add New User Data')
   .buttons([
    {
     text:'Cancel',
     click:function(e){
      this.close();
     }
    },
    {
     text:'Insert',
     type:Dialogify.BUTTON_PRIMARY,
     click:function(e)
     {
      var image_data = $('#images').prop("files")[0];
      var form_data = new FormData();
      form_data.append('images', image_data);
      form_data.append('name', $('#name').val());
      form_data.append('username', $('#username').val());
      form_data.append('age', $('#age').val());
	  form_data.append('gender', $('#gender').val());
	  form_data.append('address', $('#address').val());
	  form_data.append('phone', $('#phone').val());
	  form_data.append('email', $('#email').val());
      $.ajax({
       method:"POST",
       url:'insert_data.php',
       data:form_data,
       dataType:'json',
       contentType:false,
       cache:false,
       processData:false,
       success:function(data)
       {
        if(data.error != '')
        {
         $('#form_response').html('<div class="alert alert-danger">'+data.error+'</div>');
        }
        else
        {
         $('#form_response').html('<div class="alert alert-success">'+data.success+'</div>');
         dataTable.ajax.reload();
        }
       }
      });
     }
    }
   ]).showModal();
 });
<!-- End of add data function -->
 
 <!-- Allows admins to update information already present -->
 $(document).on('click', '.update', function(){
  var id = $(this).attr('id');
  $.ajax({
   url:"fetch_single_data.php",
   method:"POST",
   data:{id:id},
   dataType:'json',
   success:function(data)
   {
    localStorage.setItem('name', data[0].name);   
    localStorage.setItem('username', data[0].username);
    localStorage.setItem('age', data[0].age);
	localStorage.setItem('gender', data[0].gender);
	localStorage.setItem('address', data[0].address);
	localStorage.setItem('phone', data[0].phone);
	localStorage.setItem('email', data[0].email);
    localStorage.setItem('images', data[0].images);

    var options = {
     ajaxPrefix:''
    };
    new Dialogify('edit_data_form.php', options)
     .title('Edit User Data')
     .buttons([
      {
       text:'Cancel',
       click:function(e){
        this.close();
       }
      },
      {
       text:'Edit',
       type:Dialogify.BUTTON_PRIMARY,
       click:function(e)
       {
        var image_data = $('#images').prop("files")[0];
        var form_data = new FormData();
        form_data.append('images', image_data);
        form_data.append('name', $('#name').val());      
        form_data.append('username', $('#username').val());
        form_data.append('age', $('#age').val());
		form_data.append('gender', $('#gender').val());
		form_data.append('address', $('#address').val());
		form_data.append('phone', $('#phone').val());
		form_data.append('email', $('#email').val());
        form_data.append('hidden_images', $('#hidden_images').val());
        form_data.append('id', data[0].id);
        $.ajax({
         method:"POST",
         url:'update_data.php',
         data:form_data,
         dataType:'json',
         contentType:false,
         cache:false,
         processData:false,
         success:function(data)
         {
          if(data.error != '')
          {
           $('#form_response').html('<div class="alert alert-danger">'+data.error+'</div>');
          }
          else
          {
           $('#form_response').html('<div class="alert alert-success">'+data.success+'</div>');
           dataTable.ajax.reload();
          }
         }
        });
       }
      }
     ]).showModal();
   }
  })
 });
<!-- End of update function -->
 
<!-- Allows admin to delete information from the table -->
 $(document).on('click', '.delete', function(){
  var id = $(this).attr('id');
  Dialogify.confirm("<h3 class='text-danger'><b>Are you sure you want to remove this data?</b></h3>", {
   ok:function(){
    $.ajax({
     url:"delete_data.php",
     method:"POST",
     data:{id:id},
     success:function(data)
     {
      Dialogify.alert('<h3 class="text-success text-center"><b>Data has been deleted</b></h3>');
      dataTable.ajax.reload();
     }
    })
   },
   cancel:function(){
   this.close();
   }
  });
 });
 <!-- End of delete function -->
});
</script>