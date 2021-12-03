<?php
//index.php
include_once ('db.php');
function make_query($db)
{
 $query = "SELECT * FROM movies ORDER BY MovieId ASC";
 $result = mysqli_query($db, $query);
 return $result;
}

function make_slide_indicators($db)
{
 $output = '';
 $count = 0;
 $result = make_query($db);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($db)
{
 $output = '';
 $count = 0;
 $result = make_query($db);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="uploadimages/'.$row["Image"].'" alt="'.$row["Image"].'" />
   <div class="carousel-caption">
    
    <form action="about1.php" method="post" >
    <input type="hidden" name="movieId" value="'.$row["MovieId"].'" >
    <input type="submit" class="about-button" type="submit" value="About" name="submit">
    </form>
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}

?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<style type="text/css">
   /* Carousel base class*/
  .carousel {
    height: 600px;
    margin-bottom: 60px;
  }
  /* Since positioning the image, we need to help out the caption */
  .carousel-caption {
    z-index: 10;
    text-align: left;
  }
  .carousel-caption .alert-info {
    background-color: #696969;
    border: 0px;
    opacity: 0.8;
  }
  /* Declare heights because of positioning of img element */
  .carousel .item {
    height: 600px;
    background-color: #777;
  }
  .carousel-inner > .item > img {
    position: absolute;
    top: 0;
    left: 0;
    min-width: 100%;
    height: 600px;
  }
</style>
<body >
  <div>
  <div class="container">
   
   <br>
   <br>
   <br>
   <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <?php echo make_slide_indicators($db); ?>
    </ol>

    <div class="carousel-inner">
     <?php echo make_slides($db); ?>
    </div>
    <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>

   </div>
  </div>
</div>
 </body>
</html>
