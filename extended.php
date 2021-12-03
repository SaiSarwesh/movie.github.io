<?php include 'db.php';
session_start();
if(isset($_POST['movie']))
{
$_SESSION['movie']=$_POST['movie'];
}?>


  <?php
  if (isset($_POST['submit'] )&& !empty($_POST['submit']))
  {
    $Id=$db->query("select MovieId from movies where MovieName='". $_SESSION['movie']."';");
    $u=$Id->fetch_object();
    $MovieId=$u->MovieId;
    $Id1=$db->query("select TheaterId from theater where TheaterName='".$_POST['theater']."';");
    $u1=$Id1->fetch_object();
    $TheaterId=$u1->TheaterId;
      $Times=$_POST['timeSlot'];
    $Dates=$_POST['date'];
    $Price=$_POST['price'];
    $Seats=50;
      if (!(empty($Times) || empty($Dates)))
      {
          echo "<script>alert(Movie Added);</script>";
          $var=new AddShow();
          $var->showAdd($db);
      }
  }
  else{

  }
  ?>

  <?php

  class AddShow{
      public function showAdd($db)
      {
          $sql="insert into shows(ShowId,MovieId,TheaterId,Times,Dates,Seats,Price) values('',?,?,?,?,?,?);";

          if(($stmt=$db->prepare($sql))) {
              $stmt->bind_param("ssssss",$MovieId,$TheaterId,$Times,$Dates,$Seats,$Price);

          }else
          {
              var_dump($db->error);
          }
      $Id=$db->query("select MovieId from movies where MovieName='". $_SESSION['movie']."';");
      $u=$Id->fetch_object();
      $MovieId=$u->MovieId;
      $Id1=$db->query("select TheaterId from theater where TheaterName='".$_POST['theater']."';");
      $u1=$Id1->fetch_object();
      $TheaterId=$u1->TheaterId;
        $Times=$_POST['timeSlot'];
      $Dates=$_POST['date'];
      $Price=$_POST['price'];
      $Seats=50;
          $stmt->execute();
          $stmt->close();
          header ("Location: admin.php" );
      }
  }


  ?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <form action="extended.php" method="post" >
      <div class="dates">
        <strong>Date</strong>
        <?php
          $Id3=$db->query("select * from movies where MovieName='". $_SESSION['movie']."';");
          $u3=$Id3->fetch_object();
        ?>
        <input type="date" name="date" min="<?php echo $u3->InDate?>" max="<?php echo $u3->OutDate?>">
      </div>

      <div class="show-time">
        <strong>Show Time</strong>
        <select name="timeSlot" class="boxStyle">
          <?php
            $timeSlot=$db->query("select slots from time");
            while ($showTime=$timeSlot->fetch_object()) {
              echo " <option value='".$showTime->slots."'>". $showTime->slots."</option>";
            }
          ?>
        </select>
      </div>
      <div class="theater-name">
        <strong>Theater</strong></td>
        <select name="theater" class="boxStyle">
          <?php
            $re=$db->query("select TheaterName from theater");
            while ($th=$re->fetch_object()) {
              echo " <option value='".$th->TheaterName."'>". $th->TheaterName."</option>";
            }
          ?>
        </select>
      </div>
      <div class="theater-name">
        <strong>Price</strong></td>
        <input type=number min=0 name=price>
      </div>
      <input type="submit" name="submit" value="Add Show" class="show-button" />
    </form>
</body>
</html>
