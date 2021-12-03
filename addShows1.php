<?php include 'db.php';
session_start(); ?>



<!DOCTYPE html>
<head>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous">
</script>
<script>
    $(document).ready(function(){
        $( "#selection" ).change(function(){
            var txt = $("#selection").val();
            $.post("extended.php", {movie: txt}, function(result){
              $("span").html(result);
            });
          });
        });
</script>
<style type="text/css">
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }




    .add-movie {
        width: 50%;
    }



    .heading {
        margin-bottom: 60px;
        text-align: left;
        font-size: 30px;
        color: rgb(72, 72, 72);
    }



    .movie-select {
        border-radius: 15px;
        padding: 25px 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 50px 0;
        background-image: url(images/showbg.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        color: whitesmoke;
    }



    .show-details {
        display: flex;
        flex-direction: column;
        background-color: rgba(72, 72, 72, .9);
        border-radius: 15px;
        padding: 20px;
        width: 65%;
        margin-bottom: 60px;

      }
      .movie-name, .dates, .show-time, .theater-name {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        font-size: 25px;
      }

      input[type=text], input[type=number], input[type=date], input[type=file], textarea, select {
      padding: 12px 20px;
      margin: 8px 0;
      border-radius:30px;
      outline: none;
      border: none;
      width: 270px;
    }



      .back-to-admin button {
          padding: 20px;
          background-color: #b22222;
          color: whitesmoke;
          font-size: 20px;
          margin-bottom: 20px;
          border: 2px solid #b22222;
          border-radius: 50px;
          cursor: pointer;
      }

      .show-button {
        font-size: 20px;
        padding: 20px;
        border-radius: 30px;
        margin-top: 30px;
        background-color: #202020;
        border: #202020;
        color: white;
        cursor: pointer;
      }


</style>
</head>



<body>
  <div class="overall-background">
      <?php include_once 'header1.php'; ?>
      <center><div class="add-movie">
          <div class="movie-select">
              <div class="heading">
                  <h1>Add Show</h1>
              </div>
              <div class="show-details">
                   <div class="movie-name">
                       <strong>Movie</strong>
                       <select name="movie" id="selection">
                         <option disabled selected value> -- Select a Movie -- </option>



                           <?php $resourse=$db->query("select MovieName from movies");



                           while ($theater=$resourse->fetch_object()) {



                               echo " <option value='".$theater->MovieName."'>". $theater->MovieName."</option>";
                           }
                           ?>
                       </select>
                   </div>
                <span></span>
            </div>
          </div>
          <div class="back-to-admin">
              <button
                  onclick="document.location.href='admin.php'">BACK TO THE ADMIN PAGE
              </button>
          </div>
    </div></center>
      <?php include 'footer.php'; ?>
    </div>
</body>
</html>
