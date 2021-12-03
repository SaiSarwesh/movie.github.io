<?php include_once ('db.php');
session_start();


$Id1=$db->query("select * from users where username='". $_SESSION['username']."';");
$u1=$Id1->fetch_object();
$UserId=$u1->UserId;
$Id2=$db->query("select * from bookingdetails where UserId='". $UserId."'ORDER BY TimeofBooking DESC;");//once u figure out sessions just add where user=userid
?>
<style type="text/css">
    * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
    }

    .movie-details {
      padding: 20px;
      background-color: #1f1f2e;
      color: white;
      margin: 20px;
      display: inline-block;
      border-radius: 25px;
    }

    .movie-details .movie-title {
      font-weight: 600;
      font-size: 50px;
      margin-bottom: 10px
    }

    .booking-list {
        display: flex;
        flex-direction: column;
        background-color: white;
        border-radius: 10px;
        width: 50%;
        margin: 20px auto;
    }

    .booking-item {
        padding: 20px;
        font-size: 25px;
    }



</style>
<div class="overall-background">
    <?php include 'header1.php'; ?>
    <center><div class="movie-details">
        <div class="movie-title">
        Booking History
        </div>
    </div></center>
<div class="booking-list">
<?php
while ($u2=$Id2->fetch_object()) {
    ?>
    <div class="booking-item">
    <?php
    $seats=$u2->SeatDetails;
    $ShowId=$u2->ShowId;
    $Id3=$db->query("select * from shows where ShowId='".$ShowId."';");
    $u3=$Id3->fetch_object();
    $MovieId=$u3->MovieId;
    $TheaterId=$u3->TheaterId;
    $time=$u3->Times;
    $date=$u3->Dates;
    $Id5=$db->query("select * from theater where TheaterId='". $TheaterId."';");
    $u5=$Id5->fetch_object();
    $Theatername=$u5->TheaterName;
    $Id4=$db->query("select * from movies where MovieId='". $MovieId."';");
    $u4=$Id4->fetch_object();
    $MovieName=$u4->MovieName;
    ?>
        Movie: &nbsp;&nbsp;<?php echo $MovieName;?>
        <br>
        Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date;?>
        <br>
        Time: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $time;?> pm
        <br>
        Theater:&nbsp;<?php echo $Theatername;?>
        <br>
        Seat:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $seats;?>
        <?php echo "<br/>";?>
        <hr>
    </div>
    <?php
}
?>
</div>
    <?php include 'footer.php'; ?>



</div>
