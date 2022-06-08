<div class="form-group">
 <label>Enter Player Name</label>
 <input type="text" name="name" id="name" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Player Position</label>
 <input type="text" name="position" id="position" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Player Age</label>
 <input type="text" name="age" id="age" class="form-control" />
</div>
<div class="form-group">
 <label>Select Player Image</label>
 <input type="file" name="images" id="images" />
 <span id="uploaded_image"></span>
 <input type="hidden" name="hidden_images" id="hidden_images" />
</div>

<script>
 $(document).ready(function () {

  var name = localStorage.getItem('name');
  var position = localStorage.getItem('position');
  var age = localStorage.getItem('age');
  var images = localStorage.getItem('images');

  $('#name').val(name);
  $('#position').val(position);
  $('#age').val(age);

  if(images != '')
  {
   $('#uploaded_image').html('<img src="images/'+images+'" class="img-thumbnail" width="100" />');
   $('#hidden_images').val(images);
  }

 });
</script>