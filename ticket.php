<?php include_once ('db.php');
session_start();
$Id1=$db->query("select * from users where username='". $_SESSION['username']."';");
$u1=$Id1->fetch_object();
$UserId=$u1->UserId;
$Id2=$db->query("select * from bookingdetails where TimeofBooking=(SELECT MAX(TimeofBooking) FROM bookingdetails) and UserId='". $UserId."';");//once u figure out sessions just add where user=userid
$u2=$Id2->fetch_object();
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

/*echo $MovieName;
echo " ";
echo $Theatername;
echo " ";
echo $time;
echo " ";
echo $seats;*/
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
      margin: 20px 20px;
      border-radius: 25px;
    }

    .movie-details .movie-title {
      font-weight: 600;
      font-size: 50px;
      margin-bottom: 10px
    }

    .booking-wrapper {
          width: 40%;
          margin: 60px 0;
          border-radius: 10px;
          background-color: #711324;
          padding: 0 20px;
          font-size: 30px;
          color: white;
          text-align: left;
      }

      .flex-spacing {
          display: flex;
      }

      .booking-wrapper .date,.time, .seat-details, .theater-details {
          width: 50%;
      }

      .padding-div {
          padding: 20px 0;
      }

      .movie-img img{
          height: 250px;
          width: 100%;
      }

      .tickets {
          padding: 20px;
          margin-bottom: 50px;
          background-color: firebrick;
          border: 1px solid firebrick;
          border-radius: 15px;
      }

      a {
          font-size: 20px;
          color: white;
          text-decoration: none;
      }

</style>
<div class="overall-background">
    <?php include 'header1.php'; ?>
    <div class="movie-details">
        <div class="movie-title">
        Booking Details
        </div>
    </div>

    <center>
        <div class="booking-wrapper">
            <div class="row_3">
                <div class="username padding-div">
                    Username&nbsp;<b><?php echo $_SESSION['username'];?></b>
                </div>
            </div>

            <div class="movie-img">
                <?php
                echo "
                    <img src='uploadimages/".$u4->Image."'>
                ";
                ?>
            </div>

            <div class="movie-name padding-div">
                <h2><?php echo $MovieName;?></h2>
            </div>
            <hr>
            <div class="row_1 flex-spacing">
                <div class="date padding-div">
                    Date
                    <h5><?php echo $date?></h5>
                </div>
                <div class="time padding-div">
                    Time
                    <h5><?php echo $time;?> pm</h5>
                </div>
            </div>
            <hr>
            <div class="row_2 flex-spacing" style="padding-bottom: 5px">
                <div class="theater-details padding-div">
                    Cinema
                    <h5><?php echo $Theatername;?></h5>
                </div>
                <div class="seat-details padding-div" >
                    Seats
                    <h5><?php echo $seats;?></h5>
                </div>
            </div>
        </div>
        <button class="tickets"><a href="index.php">Book more Tickets</a></button>
    </center>
    <?php include 'footer.php'; ?>
</div>
