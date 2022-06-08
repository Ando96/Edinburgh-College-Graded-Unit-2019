<div class="form-group">
 <label>Enter Report Title</label>
 <input type="text" name="report_title" id="report_title" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Report Date</label>
 <input type="date" name="report_date" id="report_date" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Report Content</label>
 <textarea name="report_content" id="report_content" class="form-control" />
</div>
<div class="form-group">
 <label>Select Fixture Image</label>
 <input type="file" name="images" id="images" />
 <span id="uploaded_image"></span>
 <input type="hidden" name="hidden_images" id="hidden_images" />
</div>

<script>
 $(document).ready(function () {

  var report_title = localStorage.getItem('report_title');
  var report_date = localStorage.getItem('report_date');
  var report_content = localStorage.getItem('report_content');
  var images = localStorage.getItem('images');

  $('#report_title').val(report_title);
  $('#report_date').val(report_date);
  $('#report_content').val(report_content); 
  $('#fixture_date').val(fixture_date);
 
  if(images != '')
  {
   $('#uploaded_image').html('<img src="images/'+images+'" class="img-thumbnail" width="100" />');
   $('#hidden_images').val(images);
  }

 });
</script>