<?php
/*
  Luke Gough 30003918
  Kyper Potts 30003389
  Brandon Price P459899
*/

//Checks wether admin account is logged into the database
session_start();
if(isset($_SESSION['admin']) || isset($_SESSION['user']))
{
include("../templates/header.php");
if(isset($_POST['likeordislike'])){
	$movieid = $_POST["movieID"];
	$likeordislike = $_POST["likeordislike"];
	// Connect to Database
try {
	require("connect.php");
} catch(PDOException $e) {
	echo "ERROR: Could not connect. " . $e->getMessage();
}
if($likeordislike == 0)// like
{
	//SELECT movie_id from streaming_table
	$query1 = "SELECT movie_like FROM `streaming_table` WHERE movie_title = '$movieid'";
	$stmt = $conn->prepare($query1);
	$stmt->execute();
	
	//if record exists
	if($stmt->rowCount() > 0) {
		$row = $stmt->fetchObject();
		
		$movie_like_count = $row->movie_like;
		
		//UPDATE movie_like 
		$query2 = "UPDATE streaming_table SET movie_like = '$movie_like_count' + 1 WHERE movie_title = '$movieid'";
		$stmt = $conn->prepare($query2);
		$stmt->execute();
		echo 'Successfully liked movie!';
	}
	
	//else create new record
	else
	{
		//INSERT new stream_table record
		$query2 = "INSERT INTO `streaming_table` (`movie_title`, `movie_like`) VALUES ('$movieid', 1)";
		$stmt = $conn->prepare($query2);
		$stmt->execute();
		echo 'Successfully liked movie!';
	}
}
else if($likeordislike == 1)//dislike
{
	//SELECT movie_id from streaming_table
	$query1 = "SELECT movie_dislike FROM `streaming_table` WHERE movie_title = '$movieid'";
	$stmt = $conn->prepare($query1);
	$stmt->execute();
	
	//if record exists
	if($stmt->rowCount() > 0) {
		$row = $stmt->fetchObject();
		
		$movie_dislike_count = $row->movie_dislike;
		
		//UPDATE movie_like 
		$query2 = "UPDATE streaming_table SET movie_dislike = $movie_dislike_count + 1 WHERE movie_title = '$movieid'";
		$stmt = $conn->prepare($query2);
		$stmt->execute();
		echo 'Successfully disliked movie!';
	}
	
	//else create new record
	else
	{
		//INSERT new stream_table record
		$query2 = "INSERT INTO `streaming_table` (`movie_title`, `movie_dislike`) VALUES ('$movieid', 1)";
		$stmt = $conn->prepare($query2);
		$stmt->execute();
		echo 'Successfully disliked movie!';
	}
}

}
else
{
	echo 'Please select like or dislike!';
}
echo "<p></p>";
echo "<div class=\"row text-white\"> <!-- Start Row One -->";
echo "<div class=\"col-12 col-sm-6\">";
echo "<a class=\"button\" href=\"piechart.php/\">Pie Chart</a>";
echo "</div>";
echo "</div> <!-- End Row One -->";
echo "<p></p>";
echo "<a class=\"button\" href=\"../\">Back</a>";
include("../templates/footer.php"); 
}
else
{
	echo "Please login!";
	header("refresh:2;url=user_login.php");
}
?>