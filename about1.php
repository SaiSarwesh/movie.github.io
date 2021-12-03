<?php include 'db.php';
session_start();
if(empty($_SESSION['username'])){header('location: login.php');}?>
<!DOCTYPE html>
<html>
<head>
    <title>Ticket</title>
</head>



<style>
    * {
        margin: 0;
        padding: 0;
    }



    .outer-wrapper {
        border-radius: 10px;
        width: 65%;
        margin-bottom: 20px;
        background-image: url(images/e.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        color: whitesmoke;
        padding: 40px 0;
    }



    .movie-title {
        border-radius: 6px 6px 0 0;
        padding: 10px;
    }
    .movie-name {
        text-align: center;
        font-size: 60px;
        font-weight: 700;
    }



    .movie-details {
        display: flex;
        justify-content: space-around;
        font-size: 20px;
        padding: 20px;
        margin: 20px;
    }



    .movie-img {
        align-self: center;
    }



    .movie-img img {
        height: 300px;
        width: 300px;
        border-radius: 10px;
    }



    .movie-detail > div {
        width: 300px;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        border-radius: 15px;
        background-color: rgba(88, 88, 88, .5);
    }



    .trailer {
        display: flex;
        flex-direction: column;
        justify-content:space-around;
        padding: 20px;
        border-radius: 15px;
        background-color: rgba(88, 88, 88, .5);
    }



    form {
        text-align: center;
        padding: 10px 0;
        margin-bottom: 10px;
    }



    input[type=submit] {
        padding: 10px;
        background-color: red;
        border: 2px solid red;
        border-radius: 25px;
        color: white;
        font-weight: 700;
        font-size: 20px;
        cursor: pointer;
        width: 20%;
    }



    .footer-div {
        width: 95%;
    }



</style>
<body>
    <div class="overall-background">
    <?php include_once 'header1.php'; ?>
    <br>
    <center>
        <div class="outer-wrapper">
        <div class="movie-title">
            <div class="movie-name">
                <?php
                    $MovieId=$_POST['movieId'];
                    $res=$db->query("select * from movies where MovieId=$MovieId;");
                    $row=$res->fetch_object();
                    echo "".$row->MovieName;
                ?>
            </div>
        </div>
        <div class="movie-details">
            <!--
            <div class="movie-img">
                <img alt="User Pic" src=<?php echo '"uploadimages/'.$row->Image.'"';?>>
            </div>
        -->
            <div class="trailer">
                <strong>Trailer</strong>
                <iframe width="420" height="315" src=<?php echo "https://www.youtube.com/embed/".$row->Trailer;    ?> frameBorder="0"></iframe>
            </div>
            <div class="movie-detail">
                        <div><strong>Movie Name </strong>
                        <?php echo "".$row->MovieName;?></div>

                        <div><strong>Genre</strong>
                        <?php echo "".$row->Genre;?></div>

                        <div><strong>Director</strong>
                        <?php echo "".$row->Director;?></div>

                        <div><strong>IMDB</strong>
                        <?php echo "".$row->Imdb;?></div>

                        <div style="display:flex; flex-direction: column"><strong>Description</strong><br>
                        <?php echo "".$row->Description;?></div>
            </div>
        </div>
        <form action='booking.php' method='post' >
            <input type='hidden' name='movieId' value='<?php echo $row->MovieId?>' >
            <input type='submit' class='booking-button' type='submit' value='BOOK' name='submit'>
        </form>
    </div>
</center>

<?php include 'footer.php'; ?>
</div>
</body>
</html>
