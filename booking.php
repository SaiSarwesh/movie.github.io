<?php include_once ('db.php');
   //include('session.php');
   session_start();?><!DOCTYPE html>
<html lang="en">





<head>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>





      <script>
          $(document).ready(function(){
            $( ".selection" ).click(function(){
                  var txt = $(this).val();
                  var txt1 = '<?php echo $_POST['movieId']; ?>';
                  $.post("ext.php", {date: txt,movie:txt1},
                      function(result){
                        $("span").html(result);
                      });
            });
          });
    </script>





    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" href="style/styles.css">
    <title>Movies Schedule</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">






    <script type="text/javascript">
        $(function() {



           var print = function(msg) {
             alert(msg);
           };



           var setInvisible = function(elem) {
             elem.css('visibility', 'hidden');
           };



           var setVisible = function(elem) {
             elem.css('visibility', 'visible');
           };



           var elem = $(".elem");
           var items = elem.children();



           // Inserting Buttons
           elem.prepend('<div id="right-button" style="visibility: hidden;"><a href="#"><</a></div>');
           elem.append('<div id="left-button"><a href="#">></a></div>');



           // Inserting Inner
           items.wrapAll('<div id="inner" />');



           // Inserting Outer
           debugger;
           elem.find('#inner').wrap('<div id="outer"/>');



           var outer = $('#outer');



           var updateUI = function() {
             var maxWidth = outer.outerWidth(true);
             var actualWidth = 0;
             $.each($('#inner >'), function(i, item) {
               actualWidth += $(item).outerWidth(true);
             });



             if (actualWidth <= maxWidth) {
               setVisible($('#left-button'));
             }
           };
           updateUI();



           $('#right-button').click(function() {
             var leftPos = outer.scrollLeft();
             outer.animate({
               scrollLeft: leftPos - 200
             }, 800, function() {
               debugger;
               if ($('#outer').scrollLeft() <= 0) {
                 setInvisible($('#right-button'));
               }
             });
           });



           $('#left-button').click(function() {
             setVisible($('#right-button'));
             var leftPos = outer.scrollLeft();
             outer.animate({
               scrollLeft: leftPos + 200
             }, 800);
           });



           $(window).resize(function() {
             updateUI();
           });
     });
    </script>
    <style type="text/css">

        * {
          margin: 0;
          padding: 0;
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



        .schedule-section {
          padding: 50px;
          background-color: #484848;
          border: 2px solid #484848;
          border-radius: 30px;
          margin: 50px 200px;
        }



        #outer {
           float: left;
           width: 705px;
           overflow: hidden;
           white-space: nowrap;
           display: inline-block;
         }



         #left-button {
           float: left;
           width: 30px;
           text-align: center;
           padding-top: 10px;
           font-size: 40px;
         }



         #right-button {
           float: left;
           width: 30px;
           text-align: center;
           padding-top: 10px;
           font-size: 40px;
         }



        a {
           text-decoration: none;
           color: red;
        }



         #inner:first-child {
               margin-left: 0;
         }



        label {
           margin-left: 10px;
        }



        .hide {
           display: none;
        }



        .dates {
          padding: 20px 0 20px 0;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
        }

        .selection {
          padding: 20px;
          font-size: 1.25rem;
        }

    </style>
</head>
<body>
  <div class="overall-background">
  <?php include 'header1.php';
  ?>
    <div class="booking-wrapper">
      <div class="movie-details">
        <?php $Id4=$db->query("select * from movies where MovieId='". $_POST['movieId']."';");
          $u4=$Id4->fetch_object();
          ?>
          <div class="movie-title">
            <?php echo $u4->MovieName;?>
          </div>
          <div class="release-date">
            <?php
              echo 'Release Date: '.$u4->InDate
            ?>
          </div>
          <div class="genre">
            <?php
              echo 'Genre: '.$u4->Genre
            ?>
          </div>
          <div class="imdb">
            <?php
              echo 'IMDB: '.$u4->Imdb;
            ?>
          </div>
      </div>
      <div class="schedule-section">
        <!--
          <?php echo $_POST['movieId'];?>
        -->
          <h1>Schedule</h1>




          <div class="dates">
            <p>
                <br>
                <?php $Id3=$db->query("select * from movies where MovieId='". $_POST['movieId']."';");
                $u3=$Id3->fetch_object();
                $i=0;
                $datetime1 = strtotime($u3->InDate);
                $datetime2 = strtotime($u3->OutDate);
                $secs = $datetime2 - $datetime1;// == <seconds between the two times>
                $days = $secs / 86400;?>
                <div class="elem">
                  <?php
                while($i<=$days)//this is the number of dates being displayed
                { ?>
                    <input type="button" class="selection" value="<?php echo date('Y-m-d',strtotime("+$i day", $datetime1)); ?>" />



                      <?php $i++;
                  } ?>
                </div>
            </p>



            <span></span>
          </div>
      </div>
    <?php include 'footer.php'; ?>
  </div>
</body>
</html>
