<?php
session_start();
if(isset($_SESSION['log']))
{
	// this line includes the HTML file header.php
include("../templates/header.php");
echo "<p></p>";
echo "<div class=\"row text-white\"> <!-- Start Row One -->";
echo "<div class=\"col-12 col-sm-6\">";
echo "<a class=\"button\" href=\"../\">Back</a>";
echo "</div>";
echo "</div> <!-- End Row One -->";

// this line includes the HTML file footer.php
include("../templates/footer.php");

}
else
{
	echo "please fill proper details";
	header("refresh:2;url=1login.php");
}
?>



