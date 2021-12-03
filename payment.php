<?php include_once ('db.php');
session_start();



#$Id1=$db->query("select * from users where username='". $_SESSION['username']."';");
#$u1=$Id1->fetch_object();
#$UserId=$u1->UserId;
#$Id2=$db->query("select * from bookingdetails where TimeofBooking=(SELECT MAX(TimeofBooking) FROM bookingdetails) and UserId='". $UserId."';");//once u figure out sessions just add where user=userid
#$u2=$Id2->fetch_object();
$seats=$_POST["seat"];
$ShowId=$_POST["showId"];
$Id3=$db->query("select * from shows where ShowId='".$ShowId."';");
$u3=$Id3->fetch_object();
$MovieId=$u3->MovieId;
$TheaterId=$u3->TheaterId;
$time=$u3->Times;
$date=$u3->Dates;
$priceperticket=$u3->Price;
$Id5=$db->query("select * from theater where TheaterId='". $TheaterId."';");
$u5=$Id5->fetch_object();
$Theatername=$u5->TheaterName;
$Id4=$db->query("select * from movies where MovieId='". $MovieId."';");
$u4=$Id4->fetch_object();
$MovieName=$u4->MovieName;
$seatNo=explode(",",$seats);
$seatNo = count($seatNo);
$price = $seatNo*$priceperticket;
/*echo $MovieName;
echo " ";
echo $Theatername;
echo " ";
echo $time;
echo " ";
echo $seats;*/
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
    * {
        margin:0;
        padding: 0;
        box-sizing: border-box;
    }



    .padding-div {
          padding: 20px 0;
      }



      .flex-spacing {
         display: flex;
      }



    .payment-page {
        width:100%;
        display: flex;
    }



    .payment-details {
        margin: 100px;
        padding: 10px 60px;
        /*padding-left: 60px;*/
        background-color: white;
        font-size: 25px;
        border-radius: 20px;
        width: 75%;
    }



    .input-fields {
        display: flex;
        padding: 20px 0    ;
    }



    .col:not(:last-child) {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 250px;
        padding: 10px 10px 10px 0;
    }



    .col:last-child {
        height: 250px;
        padding: 10px;
    }



    .expiry-year {
        margin-top: 130px;
        display: flex;
        width: 100%;
    }




    input[type=text] {
        padding: 10px;
        border-radius: 10px;
        outline: none;
    }



    input[type=text]:focus {
        border: 1.5px solid blue;
    }




    #cardHolderName, #cardNumber {
        width: 250px;
    }



    #expMonth, #CVV, #expYear {
        width: 100px;
    }



    #expYear {
        margin-left: 10px;
    }




    .cart {
        background-color: white;
        width: 35%;
        border-radius: 20px;
        margin: 100px;
        padding: 40px 20px;
        font-size: 25px;
    }



      .date, .time, .seat-details, .theater-details {
          width: 50%;
     }



      .btn {
          background-color: black;
          padding: 10px;
          width: 100px;
          cursor: pointer;
          color: white;
          border-radius: 20px;
          border:none;
          font-size: 20px;
          margin-top: 20px;
      }




</style>
<html>
<body>
<div class="overall-background">
    <?php include 'header1.php'; ?>
    <div class="payment-page">
        <div class="payment-details">
            <form action="process.php" method="post">
                <h3>Payment</h3>
                <hr>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>
                  <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>
                <div class="input-fields">
                    <div class="col">
                        <div class="name">Name on card</div>
                        <div class="card-number">Credit card number</div>
                        <div class="exp-month">Expiry Month</div>
                        <div class="cvv">CVV</div>
                    </div>
                    <div class="col">
                        <input type="text" id="cardHolderName" maxlength="30">
                        <input type="text" id="cardNumber">
                        <input type="text" id="expMonth" maxlength="2">
                        <input type="text" id="CVV" maxlength="3">
                    </div>
                    <div class="col">
                        <div class="expiry-year">
                            Expiry Year
                            <input type="text" id="expYear" maxlength="2">
                        </div>
                    </div>



                </div>
                    <input type="hidden" name="seat" value="<?php echo $seats?>">
                    <input type="hidden" name="showId" value="<?php echo $ShowId;?>">
                    <input type="submit" value="Book" name="submit" class="btn">



            </form>
        </div>
        <div class="cart">
            <h2>Cart</h2>
             <div class="movie-name padding-div">
                <h3><?php echo $MovieName;?></h3>
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
            <div class="row_2 flex-spacing">
                <div class="theater-details padding-div">
                    Cinema
                    <h5><?php echo $Theatername;?></h5>
                </div>
                <div class="seat-details padding-div" >
                    Seats
                    <h5><?php echo $seats;?></h5>
                </div>
            </div>
            <hr>
            <div class="price flex-spacing padding-div">
                <b>Total: Rs.<?php echo $price; ?></b>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>



</div>
</body>
</html>
