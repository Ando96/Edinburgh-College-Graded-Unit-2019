<div class="form-group">
 <label>Enter Event Title</label>
 <input type="text" name="event_title" id="event_title" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Event Date</label>
 <input type="date" name="event_date" id="event_date" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Event Content</label>
 <textarea name="event_content" id="event_content" class="form-control" />
</div>
<div class="form-group">
 <label>Select Event Image</label>
 <input type="file" name="images" id="images" />
 <span id="uploaded_image"></span>
 <input type="hidden" name="hidden_images" id="hidden_images" />
</div>

<script>
 $(document).ready(function () {

  var event_title = localStorage.getItem('event_title');
  var event_date = localStorage.getItem('event_date');
  var event_content = localStorage.getItem('event_content');
  var images = localStorage.getItem('images');

  $('#event_title').val(event_title);
  $('#event_date').val(event_date);
  $('#event_content').val(event_content); 
  $('#fixture_date').val(fixture_date);
 
  if(images != '')
  {
   $('#uploaded_image').html('<img src="images/'+images+'" class="img-thumbnail" width="100" />');
   $('#hidden_images').val(images);
  }

 });
</script>