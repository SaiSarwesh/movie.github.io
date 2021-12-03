<?php



include_once ('db.php');
session_start();
   //include('session.php');



?>
</!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: white;
        }



        .bigbox {
            border-radius: 20px;
            background-image: url(images/c.jpg);
            width: 65%;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            padding: 40px;
            padding-bottom: 80px;
            margin: 100px;
        }




        .heading {
            font-size: 40px;
            font-weight: 600;
            padding: 20px;
        }



        .inner-box {
            display: flex;
            justify-content: space-around;
            padding: 20px;
        }



        .inner-box a {
            text-decoration: none;
            color: white;
        }



        .box {
            border: none;
            background-color: rgba(88, 88, 88, .9);
            border-radius: 30px;
            padding: 40px;
            cursor: pointer;
            font-size: 30px;
        }
    </style>
</head>
<body>
    <div class="overall-background">
    <?php include_once 'header1.php'; ?>
    <center><div class="bigbox">
        <div class="heading">
            ADMIN
        </div>
        <div class="inner-box">
            <a href="AddMovie.php">
                <button class="box">
                    ADD MOVIE
                 </button>
            </a>

            <a href="addtheater.php">
                <button class="box">
                    ADD THEATRE
                </button>
            </a>
            <a href="addShows1.php">
                <button class="box">
                    ADD SHOWS
                </button>
            </a>
        </div>
    </div></center>

    <?php include 'footer.php'; ?>
</div>
</body>
</html>
