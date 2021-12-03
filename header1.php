<header>
    <style type="text/css">

        .navbari-wrapper {
            background-color: #403d39;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 40px;
            height: 50px;
        }

        .username {
        	font-size: 20px;
        	color: white;
        }

        .navbari-items {
            margin: 0;
            padding: 0;
            display: flex;
            width: 500px;
            justify-content: space-between;
        }

        .navbari-items li, .log li {
            list-style-type: none;
            padding: 10px 30px;
            transition: 200ms;
        }

        .navbari-wrapper a {
            text-decoration: none;
            color: white;
            font-size: 20px;
            font-family: Helvetica;
            font-weight: normal;
            font-style: normal;
        }

        .navbari-items li:hover, .log  li:hover {
            background-color: #ddd;
            color: black;
        }

        .navbari-items  a:hover, .log  a:hover {
            color: black;
            text-decoration: none;
        }

        .home-link {
            background-color: #eb5e28;
            padding: 10px;
            margin: 0 ;
            border: none;
            border-radius: 15px;
            height: auto;%;
        }

        .home-link a:hover {
            text-decoration: none;
            color: white;
        }

        .overall-background {
            background-color:#252422;
        }
    </style>
    <div class="navbari-wrapper">
        <div class="home-link"><a href="index.php">Home</a></div>
        <div class="navbari">

              <?php if(!isset($_SESSION['username'])){?>
                <ul class="log">
                <li><a href="login.php">Login</a></li>
              </ul>
              <?php }
              else{
              	?>
                <ul class="navbari-items">
              	<li class="username"><?php echo $_SESSION['username']; ?></li>
                <?php if($_SESSION['username']!='admin'){?>
                  <li><a href="bookinglist.php">Booking History</a></li>
              <?php }?>
                <li><a href="logout.php">Logout</a></li>
              <?php
          		}
          		?>
          </ul>
        </div>
    </div>
</header>
