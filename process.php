<?php include_once ('db.php');
session_start();
$seats=explode(",",$_POST["seat"]);
echo $_POST["showId"];
$arrlength = count($seats);
$i=0;
for($i=0;$i<$arrlength;$i++){
$sql="insert into seats(ShowId,SeatNo) values(?,?);";
if(($stmt=$db->prepare($sql))) {
    $stmt->bind_param("ss",$show,$Seat);
}else
{
    var_dump($db->error);
}
$show=$_POST["showId"];
$Seat=$seats[$i];
$stmt->execute();
$stmt->close();
}
$Id3=$db->query("select * from users where username='". $_SESSION['username']."';");
$u3=$Id3->fetch_object();
$UserId=$u3->UserId;
$sql="insert into bookingdetails(BookingId,UserId,ShowId,SeatDetails) values('',?,?,?);";
if(($stmt=$db->prepare($sql))) {
    $stmt->bind_param("sss",$User,$show,$Seat);
}else
{
    var_dump($db->error);
}
$User=$UserId;
$show=$_POST["showId"];
$Seat=$_POST["seat"];
$stmt->execute();
$stmt->close();

header('location: ticket.php');
?>
