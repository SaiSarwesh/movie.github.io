<?php include_once ('db.php');
session_start();
   //include('session.php');?>
<!DOCTYPE html>
<html lang="en">
  <head></head>
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
    }

    .movie-details .movie-title {
      margin-bottom: 10px;
    }

    .movie-details .release-date,.genre,.imdb {
      font-size: 20px;
      border: 2px solid white;
      border-radius: 20px;
      display: inline-block;
      padding: 5px;
    }

  	.booking-wrapper {
  		width: 50%;
  		margin: 60px 0;
  		border-radius: 10px;
  		background-color: #711324;
  		padding: 20px 0;
  	}

	.movie-container {
	  margin: 20px 0;
	}

	.movie-container select {
	  background-color: #fff;
	  border: 0;
	  border-radius: 5px;
	  font-size: 14px;
	  margin-left: 10px;
	  padding: 5px 15px 5px 15px;
	  -moz-appearance: none;
	  -webkit-appearance: none;
	  appearance: none;
	}

	.container {
	  perspective: 1000px;
	  margin-bottom: 30px;
	}

	.seat-wrapper {
		margin-left: 205px;
		margin-top: 50px;
	}

	.seat {
	  background-color: #444451;
	  height: 20px;
	  width: 25px;
	  margin: 3px;

	  border-top-left-radius: 10px;
	  border-top-right-radius: 10px;

	}

	.seat.selected {
	  background-color: #6feaf6;
	}

	.seat.occupied {
	  background-color: #fff;
	}

	.seat:nth-of-type(2) {
	  margin-right: 18px;
	}

	.seat:nth-last-of-type(2) {
	  margin-left: 18px;
	}

	.seat:not(.occupied):hover {
	  cursor: pointer;
	  transform: scale(1.2);
	}

	.showcase .seat:not(.occupied):hover {
	  cursor: default;
	  transform: scale(1);
	}

	.showcase {
	  background: rgba(0, 0, 0, 0.1);
	  padding: 5px 10px;
	  border-radius: 5px;
	  color: #777;
	  list-style-type: none;
	  display: flex;
	  justify-content: space-between;
	}

	.showcase li {
	  display: flex;
	  align-items: center;
	  justify-content: center;
	  margin: 0 10px;
	}

	.showcase li small {
	  margin-left: 2px;
	}

	.row {
	  display: flex;
	  margin: 0 5px;
	}

	.screen {
	  background-color: lightgrey;
	  height: 70px;
	  width: 70%;
	  margin: 15px 0;
	  transform: rotateX(-45deg);
	  box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);
	}

	p.text {
	  margin: 5px 0;
	}

	p.text span {
	  color: #6feaf6;
	}

	.selected-seats {
		background-color: orange;
		display: inline-block;
		padding: 20px;
		margin: 20px;
		border-radius: 20px;
	}

	.about-button {
		background-color: darkgrey;
		padding: 10px 20px;
		font-size: 20px;
		border: none;
		border-radius: 15px;
		margin-top: 15px;
		cursor: pointer;

	}

  </style>
  <body>
  	<div class="overall-background">
    <?php include 'header1.php'; ?>
    <?php $ShowId=$_POST['showId'];
    $res=$db->query("select SeatNo from seats where ShowId=$ShowId;");
    $a=array();
    $l=0;
    while ($row=$res->fetch_object())
    {$a[$l]=$row->SeatNo;
      $l=$l+1;
    }
    sort($a);
    $arrlength = count($a);

    ?>

    <div class="movie-details">
		<?php $Id3=$db->query("select * from shows where ShowId='". $_POST['showId']."';");
		$u3=$Id3->fetch_object();
		$MovieId=$u3->MovieId;
		$TheaterId=$u3->TheaterId;
		$time=$u3->Times;
    $date=$u3->Dates;
    $price=$u3->Price;
		$Id5=$db->query("select * from theater where TheaterId='". $TheaterId."';");
		$u5=$Id5->fetch_object();
		$Theatername=$u5->TheaterName;
		$Id4=$db->query("select * from movies where MovieId='". $MovieId."';");
		$u4=$Id4->fetch_object();
		?>
		<div class="movie-title">
		<?php echo $u4->MovieName;?>
		</div>
		<div class="release-date">
		<?php
		echo 'Theater Name: '.$Theatername;
		?>

		</div>
    <div class="genre">
		<?php
		echo 'Show Date: '.$date;
		?>
		</div>
    <div class="genre">
		<?php
		echo 'Show Time: '.$time;
		?>
		</div>
    <div class="genre">
		<?php
		echo 'Price: Rs'.$price;
		?>
		</div>

	</div>

    <center>
	    <div class="booking-wrapper">
		    <ul class="showcase">
		      <li>
		        <div class="seat"></div>
		        <small>N/A</small>
		      </li>
		      <li>
		        <div class="seat selected"></div>
		        <small>Selected</small>
		      </li>
		      <li>
		        <div class="seat occupied"></div>
		        <small>Occupied</small>
		      </li>
		    </ul>

		    <div class="container">
		      <div class="screen"></div>
		      	<div class="seat-wrapper">
			  		<?php $i=0;
					  	$m=0;
					  while ($i<5) { ?>
					      <div class="row">
					        <?php $k=0;
					        while ($k<10) { ?>
					        <div class="seat <?php if($arrlength!=0){if($a[$m]==($k+($i*10))){echo 'occupied';if($m<$arrlength-1){$m=$m+1;}}} ?>"></div>
					        <?php $k=$k+1; } ?>
					      </div>
					 <?php $i=$i+1; } ?>
				</div>
		    </div>

		    <div class="selected-seats">
				<p style="color: white; font-size: 20px;">Selected Seats</p>
				<p id="booki"></p>
			</div>

		    <form action="payment.php" method="post" >
		    <input type="hidden" name="seat" id="seat">
		    <input type="hidden" name="showId" value="<?php echo $ShowId;?>">
		    <input type="submit" class="about-button" onclick="book()" value="Book" name="submit">
		    </form>


		</div>
	</center>
<?php include 'footer.php'; ?>
    <script>

    const container = document.querySelector('.container');
    const seats = document.querySelectorAll('.row .seat');
    var p;

    const updateSelectedSeatsCount = () => {
      const selectedSeats = document.querySelectorAll('.row .selected');

      const seatsIndex = [...selectedSeats].map(seat => [...seats].indexOf(seat));
      p=seatsIndex;
      document.getElementById("booki").innerHTML=seatsIndex;
    };

    // Seat select event
    container.addEventListener('click', e => {
      if (
        e.target.classList.contains('seat') &&
        !e.target.classList.contains('occupied')
      ) {
        e.target.classList.toggle('selected');

        updateSelectedSeatsCount();
      }
    });
    function book(){
      document.getElementById("seat").value=p;
    }

</script>
</div>
</body>
</html>
