<?php add_slides(); ?>

<?php display_message() ?>

  <div class="row">

    <h3 class="bg-success"></h3>

 <div class="col-xs-3">

 <form action="" method="post" enctype="multipart/form-data">
  
<div class="form-group">

<input type="file" name="file">

</div>

<div class="form-group">
<label for="title">Slide Title</label>
<input type="text" name="slide_title" class="form-control">

</div>

<div class="form-group">

<input type="submit" name="add_slide" value="Add Slides" class="btn btn-primary">

</div>

 </form>

 </div>


 <div class="col-xs-8">
   

<?php get_current_slides_in_admin(); ?>

 </div>

</div><!-- ROW-->

<hr>

<h1>Slides Available</h1>

<div class="row">
  	
	<?php slides_thumbnails(); ?>

</div>


