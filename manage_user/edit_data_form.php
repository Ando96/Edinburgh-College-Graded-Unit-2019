<!-- Input field for name -->
<div class="form-group">
 <label>Enter User Name</label>
 <input type="text" name="name" id="name" class="form-control" />
</div>
<!-- Input field for username -->
<div class="form-group">
 <label>Enter User's username</label>
 <input type="text" name="username" id="username" class="form-control" />
</div>
<!-- Input field for age -->
<div class="form-group">
 <label>Enter User Age</label>
 <input type="text" name="age" id="age" class="form-control" />
</div>
<!-- Input field for gender -->
<div class="form-group">
 <label>Enter User Gender</label>
 <input type="text" name="gender" id="gender" class="form-control" />
</div>
<!-- Input field for address -->
<div class="form-group">
 <label>Enter User Address</label>
 <input type="text" name="address" id="address" class="form-control" />
</div>
<!-- Input field for number -->
<div class="form-group">
 <label>Enter User Phone Number</label>
 <input type="text" name="phone" id="phone" class="form-control" />
</div>
<!-- Input field for email address -->
<div class="form-group">
 <label>Enter User Email</label>
 <input type="text" name="email" id="email" class="form-control" />
</div>
<!-- Input field for image -->
<div class="form-group">
 <label>Select User Image</label>
 <input type="file" name="images" id="images" />
 <span id="uploaded_image"></span>
 <input type="hidden" name="hidden_images" id="hidden_images" />
</div>

<script>
 $(document).ready(function () {

	<!-- Stores variables so they can be changed -->
  var name = localStorage.getItem('name');
  var username = localStorage.getItem('username');
  var age = localStorage.getItem('age');
  var gender = localStorage.getItem('gender');
  var address = localStorage.getItem('address');
  var phone = localStorage.getItem('phone');
  var email = localStorage.getItem('email');
  var images = localStorage.getItem('images');

  $('#name').val(name);
  $('#username').val(username);
  $('#age').val(age);
  $('#gender').val(gender);
  $('#address').val(address);
  $('#phone').val(phone);
  $('#email').val(email);

  <!-- If image is not empty -->
  if(images != '')
  {
   $('#uploaded_image').html('<img src="images/'+images+'" class="img-thumbnail" width="100" />');
   $('#hidden_images').val(images);
  }

 });
</script>