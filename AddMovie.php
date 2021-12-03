<?php include 'db.php';
session_start(); ?>
<?php
	if (isset($_POST['submit'] )&& !empty($_POST['submit']))
	{
		$MovieName=$_POST['MovieName'];
		$InDate=$_POST['InDate'];
		$OutDate=$_POST['OutDate'];
		$Duration=$_POST['Duration'];
		$Genre=$_POST['Genre'];
		$imdb=$_POST['imdb'];
		$Director=$_POST['directorName'];
	  $Trailer=$_POST['Trailer'];
		$Description=$_POST['description'];
		if (!(empty($MovieName) || empty($Genre) || empty($Director) || empty($Description)|| empty($imdb=$_POST['imdb'] || empty($Trailer))))
		{
			echo "<script>alert(Movie Added);</script>";
			$var=new AddMovie();
			$var->movieAdd($db);
		}
	}
	else{

	}
?>

<?php
	class AddMovie{

		public function movieAdd($db)
		{
			$sql="INSERT INTO movies(MovieId,MovieName, Genre, Director, Description, Image, Imdb, Trailer,Duration,InDate,OutDate) VALUES ('',?,?,?,?,?,?,?,?,?,?);";

			if(($stmt=$db->prepare($sql))) {
				$stmt->bind_param("ssssssssss",$Name,$Genre,$Director,$Description,$image,$imdb,$Trailer,$Duration,$InDate,$OutDate);
			}else
			{
				var_dump($db->error);
			}

			$Name=$_POST['MovieName'];
			$InDate=$_POST['InDate'];
			$OutDate=$_POST['OutDate'];
			$Duration=$_POST['Duration'];
			$Genre=$_POST['Genre'];
			$Director=$_POST['directorName'];
			$Description=$_POST['description'];
			$imdb=$_POST['imdb'];
	    $Trailer=$_POST['Trailer'];
			$target="uploadimages/".basename($_FILES['image']['name']);
			$image=$_FILES['image']['name'];
			$image_tmp=$_FILES['image']['tmp_name'];

			if ($stmt->execute()) {
				if(move_uploaded_file($image_tmp, $target))
				{
					//echo "<script>alert('Movie Successfully Added');</script>";
				}
				else{
					//echo "<script>alert('Movie failed to add');</script>";
				}
			}
			$stmt->close();
			header ("Location: admin.php" );
		}
	}
?>

<!DOCTYPE html>
<html>
<head>

	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		.add-movie {
			width: 50%;
			margin-top:
		}

		.heading {
			margin-bottom: 60px;
			font-size: 30px;
		}

		.movie-details {
			border-radius: 15px;
			padding: 25px 0;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			margin: 50px 0;
			background-image: url(images/moviebg.jpg);
			background-repeat: no-repeat;
			background-size: 100% 100%;
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
	    	background-color: rgba(88,88,88,.9);
	    	border-radius: 15px;
	    	padding: 20px;
	    	margin-bottom: 125px;
	    	width: 65%;
  		}

  		.movie-name, .release-date, .out-date, .genre, .duration, .imdb, .directorName, .description, .trailer, .poster {
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


  		.movie-button {
	  		display: flex;
	  		justify-content: center;
  		}

  		.movie-btn {
  			font-size: 20px;
	  		padding: 20px;
	  		border-radius: 30px;
	  		margin-top: 30px;
	  		background-color: #202020;
	  		border: #202020;
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
		function validateMovie() {
			document.getElementById("movieNameError").innerHTML="";
			document.getElementById("nameError").innerHTML="";
			document.getElementById('dateError').innerHTML="";
			var c=0;
      		var movieName = document.forms['movie-form']['MovieName'].value;
			var inDate = document.forms['movie-form']['InDate'].value;
			var outDate = document.forms['movie-form']['OutDate'].value;
			var DirectorName = document.forms['movie-form']['directorName'].value;
			var movienameRegex = /^[A-Z][a-zA-Z0-9\s]*$/;
	        var result = movienameRegex.test(movieName);

	        if (result == false) {
	          document.getElementById("movieNameError").innerHTML="Invalid Movie Name";
	          c=c+1;
	        }
	        if (movieName==null || movieName==""){
	          document.getElementById("movieNameError").innerHTML="Movie name can't be blank";
	          c=c+1;
	        }

	        var nameRegex = /^[A-Z][A-Za-z\s]*$/;
	        var nameresult = nameRegex.test(DirectorName);

	        if (nameresult == false) {
	          document.getElementById("nameError").innerHTML="Invalid Director Name";
	          c=c+1;
	        }
	        if (DirectorName==null || DirectorName==""){
	          document.getElementById("nameError").innerHTML="Director's name can't be blank";
	          c=c+1;
	        }

	        if (inDate > outDate) {
	        	document.getElementById("dateError").innerHTML="InDate can't be greater than OutDate";
	        	c=c+1;
	        }

	        if(c > 0){
	          return false;
	        }
	    }
	</script>
</head>
<body >
	<div class="overall-background">
	<?php include_once 'header1.php'; ?>
		<center><div class="add-movie">
			<div class="movie-details">
				<div class="heading">
					<h2>Add Movie</h2>
				</div>
				<form action="addMovie.php" name="movie-form" method="post" enctype="multipart/form-data">

					<div class="movie-name">
						Movie Name
						<input  name="MovieName" placeholder="Movie Name" type="text" required autofocus>
					</div>
					<p class="error" id="movieNameError"></p>

					<div class="release-date">
			    		InDate
			    		<input type="date" name="InDate">
			    	</div>
					<div class="out-date">
						OutDate
			    		<input type="date" name="OutDate">
			    	</div>
			    	<p id="dateError" class="error"></p>

			    	<div class="genre">
						Genre
						<select name="Genre">
							<option value="Action">Action</option>
							<option value="Adventure">Adventure</option>
							<option value="Comedy">Comedy</option>
							<option value="Crime">Crime</option>
							<option value="Drama">Drama</option>
						</select>
					</div>

					<div class="duration">
	        			Duration
	        			<input name="Duration" type="number" placeholder="Duration" min="1" max="300"required>
	        		</div>

	        		<div class="imdb">
	        			IMDB
	        			<input name="imdb" placeholder="IMDB rating" type="number" min="0" max="10" required>
	        		</div>

	        		<div class="directorName">
	        			Director Name
						<input name="directorName" placeholder="Director" type="text" required>
					</div>
					<p id="nameError" class="error">

					<div class="description">
						Description
						<textarea name="description" placeholder="Add a description about the movie" required></textarea>
					</div>

					<div class="poster">
						Poster
						<input type="file" name="image" required autofocus accept="image/*">
					</div>

					<div class="trailer">
						Trailer
						<input name="Trailer" placeholder="Trailer" type="text" required>
					</div>

					<div class="movie-button">
						<input class="movie-btn" onclick="return validateMovie()" type="submit" name="submit" value="Add Movie">
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
