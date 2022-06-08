<div class="form-group">
 <label>Enter Opposition</label>
 <input type="text" name="opposition" id="opposition" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Score</label>
 <input type="text" name="score" id="score" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Fixture Date</label>
 <input type="date" name="fixture_date" id="fixture_date" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Competition</label>
 <input type="text" name="competition" id="competition" class="form-control" />
</div>
<div class="form-group">
 <label>Select Fixture Image</label>
 <input type="file" name="images" id="images" />
 <span id="uploaded_image"></span>
 <input type="hidden" name="hidden_images" id="hidden_images" />
</div>

<script>
 $(document).ready(function () {

  var opposition = localStorage.getItem('opposition');
  var score = localStorage.getItem('score');
  var fixture_date = localStorage.getItem('fixture_date');
  var competition = localStorage.getItem('competition');
  var images = localStorage.getItem('images');

  $('#opposition').val(opposition);
  $('#score').val(score);
  $('#fixture_date').val(fixture_date);
  $('#competition').val(competition);
 
  if(images != '')
  {
   $('#uploaded_image').html('<img src="images/'+images+'" class="img-thumbnail" width="100" />');
   $('#hidden_images').val(images);
  }

 });
</script>