<?php include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
</head>
<style type="text/css">
.container1 {
display: flex;
flex-direction: column;
align-items: center;
}



.showing-now {
background-color: #505050;
color: white;
padding: 10px 0;
font-size: 2rem;
font-weight: 700;
width: 65%;
text-align: center;
margin-bottom: 20px;
border-radius: 10px;
box-shadow: 2px 5px 5px black;
}



.outer_wrapper {
display: flex;
}



.card {
padding: 20px;
width: auto;
display: flex;
flex-direction: column;
justify-content: space-between;
border: 1px solid black;
border-radius: 10px;
margin-right: 10px;
background-color:#DCDCDC;
}
.card1 {
padding: 20px;
width: auto;
display: flex;
flex-direction: column;
justify-content: space-between;
border: 1px solid black;
border-radius: 10px;
margin-right: 10px;
background-color:#DCDCDC;
}


.card img {
width: 250px;
height: 250px;
border-radius: 10px;
}
.card1 img {
width: 250px;
height: 250px;
border-radius: 10px;
}

.about-button {
        padding: 10px;
        background-color: transparent;
        border: 2px solid red;
        border-radius: 50px;
        font-size: 20px;
        width: 100px;
        outline: none;
        color: red;
        transition: 250ms ease-in;
    }

    .about-button:hover {
          color: white;
          background-color: red;
    }



.flip-card {
background-color: transparent;
width: 300px;
height: 300px;
perspective: 1000px;
}



.flip-card-inner {
position: relative;
width: 100%;
height: 100%;
text-align: center;
transition: transform 0.6s;
transform-style: preserve-3d;
box-shadow: 0 4px 8px 0 rgba(0,0,0,0);

}



.flip-card:hover .flip-card-inner {
transform: rotateY(180deg);
}



.flip-card-front, .flip-card-back {
position: absolute;
width: 100%;
height: 100%;
-webkit-backface-visibility: hidden;
backface-visibility: hidden;
}



.flip-card-front {
background-color: transparent;
color: black;
}



.flip-card-back {
background-color: #2980b9;//blue color of the flip card showing now
color: white;
transform: rotateY(180deg);
border-radius: 10px;
}


.flip-card-back1 {
background-color: #9932CC;//violet color of the flip card upcoming
color: white;
transform: rotateY(180deg);
border-radius: 10px;
}
.flip-card-back1 {
position: absolute;
width: 100%;
height: 100%;
-webkit-backface-visibility: hidden;
backface-visibility: hidden;
}



</style>
<body>
  <div class="overall-background">
<div class="container1">
  <div class="showing-now">
    Showing Now
  </div>
  <div class="movies">
    <?php
    $count1=0;
    $curr_date=date("Y-m-d");
    $res=$db->query("select * from movies;");
    while ($row=$res->fetch_object())
    {  $In=$row->InDate;
       $Out=$row->OutDate;
      if(($In <=$curr_date) && ($Out >=$curr_date) )
      {
    if ($count1==0) {
    echo "<div class='outer_wrapper'>";
    }
    echo "
    <div class='card'>
    <div class='flip-card'>
    <div class='flip-card-inner'>
    <div class='flip-card-front'>
    <img src='uploadimages/".$row->Image."'>
    <h3>".$row->MovieName."</h3>
    </div>
    <div class='flip-card-back'>
    <div>
    <h3>".$row->MovieName."</h3>
    <p><b>IMDB: </b>".$row->Imdb."</p>
    <p><b>Genre: </b>".$row->Genre ."</p>
    <p><b>Director: </b>" .$row->Director."</p>
    <form action='about1.php' method='post' >
    <input type='hidden' name='movieId' value='".$row->MovieId."' >
    <input type='submit' class='about-button' type='submit' value='About' name='submit'>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    ";
    if ($count1==3) {
    echo "</div><br>";
    $count1=-1;
    }
    $count1++;
    }
    }

    ?>
</div>
</div>
</div>
</br>

<div class="container1">
<div class="showing-now">
Upcoming Movies
</div>
<div class="movies">
<?php
$count1=0;
$res=$db->query("select * from movies;");
while ($row=$res->fetch_object())
{
  $In=$row->InDate;
  $Out=$row->OutDate;

    if($In >$curr_date)
    {  $secs = strtotime($In)-strtotime($curr_date);// == <seconds between the two times>
       $days = $secs / 86400;

        if ($count1==0) {
            echo "<div class='outer_wrapper'>";
        }

        echo "
        <div class='card1'>
        <div class='flip-card'>
        <div class='flip-card-inner'>
        <div class='flip-card-front'>
        <img src='uploadimages/".$row->Image."'>
        <h3>".$row->MovieName."</h3>
        </div>
        <div class='flip-card-back1'>
        <div>
        <h3 class='movie-title'>".$row->MovieName."</h3>
        <p><b>IMDB: </b>".$row->Imdb."</p>
        <p ><b>Genre: </b>".$row->Genre ."</p>
        <p><b>Director: </b>" .$row->Director."</p>
        <p><b>Days left: </b>" .$days."</p>
        <form action='about1.php' method='post' >
        <input type='hidden' name='movieId' value='".$row->MovieId."' >
        <input type='submit' class='about-button' type='submit' value='About' name='submit'>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
        ";
        if ($count1==3) {
            echo "</div><br>";
            $count1=-1;
        }
        $count1++;
      }
}
?>
</div>
</div>
</div>

</br>
</div>
</body>
</html>
