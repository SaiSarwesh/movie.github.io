<?php include 'db.php';
session_start();
//echo $_POST['date'];
//echo $_POST['movie'];
?>
<!DOCTYPE html>
<html>
<head>
<style>



    .outer-div {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #ffd700;
        border: 2px solid #ffd700;
        width: 550px;
        font-size: 30px;
        padding: 20px 60px;
        border-radius: 25px;
    }



      .showTime {
        padding: 10px;
        font-size: 25px;
        background-color: #008080;
        color: white;
        border-radius: 20px;
        border: 2px solid #008080;
        outline: none;
        width: 70px;
      }



      .show-details {
          padding: 10px 20px;
          border-radius: 20px;
          font-size: 15px;
          color: white;
          background-color: blue;
          cursor: pointer;
          outline: none;
          border: none;
      }



</style>
</head>
<body>
  <br>
    <?php $resource=$db->query("select * from theater");
    $i=0;
        while ($theater=$resource->fetch_object()) {
        $a=$db->query("select * from shows where TheaterId='".$theater->TheaterId."' and MovieId='".$_POST['movie']."' and Dates='".$_POST['date']."';");
        $a1=$db->query("select * from shows where TheaterId='".$theater->TheaterId."' and MovieId='".$_POST['movie']."' and Dates='".$_POST['date']."';");
        if($a1->fetch_object())
        {$i=1;?>



            <div class="outer-div">
                <div class="theatreName">
                    <?php echo $theater->TheaterName;?>
                </div>
                <div class="theatreTime">
                    <?php
                        while($r=$a->fetch_object())
                        {?>
                            <form action="seat.php" method="post" >
                                <input type='hidden' name='showId' value="<?php echo $r->ShowId;?>" >
                                  <button type="submit" name="submit" class="show-details">
                                      <?php echo "Time: ".$r->Times." ";?><br><?php echo "Price: Rs".$r->Price." ";?>
                                  </button>
                              </form>
                        <?php
                    }?>
                </div>
            </div>



        <?php }?>
        <br>
    <?php }
    if($i==0){
      ?>
      <div class="outer-div">
          No Shows
      </div>
      <?php
    }?>
</body>
</html>
