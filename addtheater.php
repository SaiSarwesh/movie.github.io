<?php include 'db.php';
session_start();?>



<?php
if (isset($_POST['submit'] )&& !empty($_POST['submit']))



{
    $TheaterName=$_POST['TheaterName'];
    $Seats=$_POST['Seats'];
    if (!(empty($TheaterName) || empty($Seats)))
    {



        $var=new AddTheater();
        $var->theaterAdd($db);
    }
}
else{



}
?>



<?php
class AddTheater{
    public function theaterAdd($db)
    {
        $sql="insert into theater(TheaterId,TheaterName,Seats) values('',?,?);";



        if(($stmt=$db->prepare($sql))) {
            $stmt->bind_param("ss",$TheaterName,$Seats);



        }else
        {
            var_dump($db->error);
        }
        $TheaterName=$_POST['TheaterName'];
        $Seats=$_POST['Seats'];
        $stmt->execute();
        $stmt->close();
        header ("Location: admin.php" );
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Add Theater</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }



        .add-theater {
            width: 50%;
            margin-top:
        }



        .heading {
            margin-bottom: 60px;
            font-size: 30px;
        }



        .theater-details {

            border-radius: 15px;
            padding: 25px 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 50px 0;
            background-image: url(images/theaterbg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
        }



        .back-to-admin button {
              padding: 20px;
              background-color: #b22222;
              color: white;
              font-size: 20px;
              margin-bottom: 20px;
              border: 2px solid #b22222;
              border-radius: 50px;
              cursor: pointer;
          }



          form {
            display: flex;
            flex-direction: column;
            background-color: rgba(88, 88, 88, .9);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 90px;
            width: 65%;
          }



          .theater-name, .seat {
              display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            font-size: 25px;
          }



          input[type=text], input[type=number] {
            padding: 12px 20px;
            margin: 8px 0;
            border-radius:30px;
						outline: none;
						border:none;
        }



          .theater-button {
              display: flex;
              justify-content: center;
          }



          .theater-btn {
              font-size: 20px;
              padding: 20px;
              border-radius: 30px;
              margin-top: 30px;
              background-color: #b22222;
              border: #b22222;
              color: white;
              cursor: pointer;
          }

          .error{
            text-align: center;
            color:red;
            font-size: 15px;
          }

    </style>
    <script type="text/javascript">
      function validateTheater() {
        document.getElementById("NameError").innerHTML="";
        var c=0;
        var name = document.forms['theater-form']['TheaterName'].value;
        var nameRegex = /^[A-Z][a-zA-Z\s]*$/;
        var result = nameRegex.test(name);

        if (result == false) {
          document.getElementById("NameError").innerHTML="Invalid Theater Name";
          c=c+1;
        }
        if (name==null || name==""){
          document.getElementById("NameError").innerHTML="Name can't be blank";
          c=c+1;
        }
        if(c>0){
          return false;
        }
      }
    </script>
</head>



<body >
  <div class="overall-background">
    <?php include_once 'header1.php'; ?>
        <center><div class="add-theater">
            <div class="theater-details">
                <div class="heading">
                      <h1>Add Theater</h1>
                  </div>
                <form name="theater-form" action="addtheater.php" method="post">
                    <div class="theater-name">
                        Theater Name
                        <input  name="TheaterName" placeholder="Theater Name" type="text" tabindex="1" required autofocus>
                    </div>
                    <p id="NameError" class="error"></p>
                    <div class="seat">
                        Number of seats
                        <input name="Seats" placeholder="Seats" type="number" min="20" max="50" required autofocus>
                    </div>
                    <div class="theater-button">
                        <input class="theater-btn" onclick="return validateTheater()"type="submit" name="submit" value="Add Theater">
                    </div>
                </form>
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
