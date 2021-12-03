<?php
include("db.php");
$errors = array();
if (isset($_POST['submit'])) {
$username =$_POST['username'];
$password =$_POST['password'];
$password = md5($password);
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$results = mysqli_query($db, $query);
if (mysqli_num_rows($results) == 1) {
if ($username == 'admin') {
  session_start();
$_SESSION['username'] = $username;
header('location: admin.php');
} else {
session_start();
$_SESSION['username'] = $username;
$_SESSION['success'] = "You are now logged in";
header('location: index.php');
}
}else {
array_push($errors, "Wrong username/password combination");
}




 }
if (isset($_POST['submit1'])) {
$username =$_POST['username1'];
$email =$_POST['email'];
$password_1 =$_POST['password_1'];
$password_2 =$_POST['password_2'];
if ($password_1 != $password_2) {
array_push($errors, "The two passwords do not match");
}



 // first check the database to make sure
// a user does not already exist with the same username and/or email
$query=$db->query("select * from users where username='".$username."' or email='".$email."' limit 1;");




$user=$query->fetch_object();
if ($user) { // if user exists
if ($user->username == $username) {
array_push($errors, "Username already exists");
}



 if ($user->email == $email) {
array_push($errors, "email already exists");
}
}



 // Finally, register user if there are no errors in the form
if (count($errors) == 0) {
$password = md5($password_1);//encrypt the password before saving in the database
$sql="insert into users(UserId,username,password,email) values('',?,?,?);";
$stmt=$db->prepare($sql);
$stmt->bind_param("sss",$username,$password,$email);
$stmt->execute();
$stmt->close();
session_start();
$_SESSION['username'] = $username;
$_SESSION['success'] = "You are now logged in";
header('location: index.php');
}
}
?>
<html>




 <head>
<title>Login Page</title>
<style>
body{
margin:0;

color:white;
font:600 16px/18px 'Open Sans',sans-serif;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}




.login-wrap{
width:100%;
margin:60px auto;
max-width:525px;
min-height:670px;
position:relative;
background:url("images/d.jpg") no-repeat;
background-size: cover;
box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
width:100%;
height:100%;
position:absolute;
padding:90px 70px 50px 70px;
  background:rgba(60,60,66,.75);
}
.login-html .sign-in-htm,
.login-html .sign-up-htm{
top:0;
left:0;
right:0;
bottom:0;
position:absolute;
transform:rotateY(180deg);
backface-visibility:hidden;
transition:all .4s linear;
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
text-transform:uppercase;
}
.login-html .tab{
font-size:22px;
margin-right:15px;
padding-bottom:5px;
margin:0 15px 10px 0;
display:inline-block;
border-bottom:2px solid transparent;
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
color:#fff;
border-color:#1161ee;
}
.login-form{
min-height:345px;
position:relative;
perspective:1000px;
transform-style:preserve-3d;
}
.login-form .group{
margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
width:100%;
color:#fff;
display:block;
}
.login-form .group .input,
.login-form .group .button{
border:none;
padding:15px 20px;
border-radius:25px;
background:rgba(255,255,255,.1);
}
.login-form .group input[data-type="password"]{
text-security:circle;
-webkit-text-security:circle;
}
.login-form .group .label{
color:#aaa;
font-size:12px;
}
.login-form .group .button{
background:#1161ee;
}
.login-form .group label .icon{
width:15px;
height:15px;
border-radius:2px;
position:relative;
display:inline-block;
background:rgba(255,255,255,.1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
content:'';
width:10px;
height:2px;
background:#fff;
position:absolute;
transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
left:3px;
width:5px;
bottom:6px;
transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
top:6px;
right:0;
transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
color:#fff;
}
.login-form .group .check:checked + label .icon{
background:#1161ee;
}
.login-form .group .check:checked + label .icon:before{
transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
transform:rotate(0);
}


.foot-lnk{
text-align:center;
}
.error{
  text-align: center;
  color:red;
  font-size: 15px;
}
</style>
</head>
  <script type="text/javascript">
    function validateSignIn() {
      document.getElementById("UsernameError").innerHTML="";
      document.getElementById("PasswordError").innerHTML="";
      var c=0;
      var username = document.forms['form']['username'].value;
      var password = document.forms['form']['password'].value;
      var usernameRegex = /^[a-zA-Z0-9]+$/;
      var result = usernameRegex.test(username);

      if (result == false) {
        document.getElementById("UsernameError").innerHTML="Invalid username";
        c=c+1;
      }

      if (username==null || username==""){
        document.getElementById("UsernameError").innerHTML="Name can't be blank";
        c=c+1;
      }

      if(password.length<6){
        document.getElementById("PasswordError").innerHTML="Password must be at least 6 characters long.";
        c=c+1;
      }
      if(c>0){
        return false;
      }
    }


    function validateSignUp() {
        document.getElementById("Username1Error").innerHTML="";
        document.getElementById("Password1Error").innerHTML="";
        document.getElementById("EmailError").innerHTML="";
        document.getElementById("Password2Error").innerHTML="";
        var counter=0;
        var username1 = document.forms['form']['username1'].value;
        var password_1 = document.forms['form']['password_1'].value;
        var password_2 = document.forms['form']['password_2'].value;
        var email = document.forms['form']['email'].value;
        var usernameRegex = /^[a-zA-Z0-9]+$/;
        var result = usernameRegex.test(username1);
        if (username1==null || username1==""){
          document.getElementById("Username1Error").innerHTML="Name can't be blank";
          counter=counter+1;
        }

        if (result == false) {
          document.getElementById("Username1Error").innerHTML="Invalid username";
          counter=counter+1;
        }

        if(password_1.length<6){
          document.getElementById("Password1Error").innerHTML="Password must be at least 6 characters long.";
          counter=counter+1;
        }

        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(email) == false) {
          document.getElementById("EmailError").innerHTML="Invalid Email Address";
            counter=counter+1;
        }

        if(password_1!=password_2) {
          document.getElementById("Password2Error").innerHTML="Passowrds don't match";
          counter=counter+1;
        }
        if(counter>0){
          return false;
        }
      }
  </script>



 <body>
<div class="overall-background">
<?php include 'header1.php'; ?>




<form name="form" method="post" action="login.php">
<?php include('errors.php'); ?>
<div class="login-wrap">
<div class="login-html">
<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
<div class="login-form">
<div class="sign-in-htm">
<div class="group">
<label>Username</label>
<input type="text" name="username" class="input">
</div>
<p id="UsernameError" class="error"></p>
<div class="group">
<label>Password</label>
<input type="password" name="password" class="input">
</div>
<p id="PasswordError" class="error"></p>
<div class="group">
<button type="submit" class="button" onclick="return validateSignIn()" name="submit">Login</button>
</div>

</div>
<div class="sign-up-htm">
<div class="group">
<label>Username</label>
<input type="text" name="username1" class="input">
</div>
<p id="Username1Error" class="error"></p>
<div class="group">
<label>Email</label>
<input type="text" name="email" class="input">
</div>
<p id="EmailError" class="error"></p>
<div class="group">
<label>Password</label>
<input type="password" name="password_1" class="input">
</div>
<p id="Password1Error" class="error"></p>
<div class="group">
<label>Confirm password</label>
<input type="password" name="password_2" class="input">
</div>
<p id="Password2Error" class="error"></p>
<div class="group">
<button type="submit" class="button" onclick="return validateSignUp()" name="submit1">Register</button>
</div>
<p>
Already a member? <a href="login.php">Sign in</a>
</p>
</div>
</div>
</div>
</div>
</form>
<?php include 'footer.php'; ?>
</div>
</body>
</html>
