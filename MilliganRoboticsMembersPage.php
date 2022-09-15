<!doctype html lang="en">
<html lang="en"><head>
    <!--
    This is the Head element, it is where the metadata for the website goes
    -->
    <title>Milligan Robotics Members Page</title>
<meta charset="utf-8">
<link href="MembersPageStyles.css" rel="stylesheet" type="text/css">
<!--
<div class=card>
<p>
Hey look a card.
</p>
</div>
-->

</head>


<body>


<style>
.HiddenText
{
color:yellow;

}
.HiddenTextTrigger:hover + .HiddenText
{
color:blue;
}
</style>

<?php
// using code from:
//UploadTestPHPScript.php
//https://www.techfry.com/php-tutorial/how-to-execute-mysql-query-in-php
//https://www.w3schools.com/php/php_mysql_insert.asp
//https://www.php.net/manual/en/function.echo.php
//https://circuits4you.com/2018/03/10/esp8266-nodemcu-post-request-data-to-website/
//https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_display_element_hover

//Test PHP
echo 'PHP running';



//Credentials
$servername="sql106.epizy.com";//My SQL Host name
$username="epiz_29559695"; //FTP Username
$password="9nM9rf3XEJ"; //FTP password
$dbname="epiz_29559695_MilliganRoboticsDb";//Database name

//Connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Connection check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
echo "Connected to MySQL";
}

//lets put in the nav bar

echo "<div class='column'>";
echo "<nav id='HomePageNavBar'>";
//This is the nav element, this is where we create our navigation bar-->
echo "<ul>";
echo "<li><a href='index.html'>About Us </a></li>";
echo "<li><a href='WebsiteProjects.html'>Products</a></li>";
echo "<li><a href=MembersPage.php>Team Members</a></li>";
echo "<li><a href=ContactPage.html>Events</a> </li>";
echo "<li><a href='ContactPage.html'>Team History</a> </li>";       
echo "<li><a href='ContactPage.html'>Contact Us</a> </li>";         
echo "</ul>";
echo "</nav>";
echo "</div>"; //ends the column

//select SQL data
$sql = "SELECT TeamMemberName, FirstName, LastName, ImageFileName, Title, Links, Bio FROM TeamMembers";
$result = $conn->query($sql);

if ($result ->num_rows > 0) {

//Table Headers



//table data?
while ($row=$result->fetch_assoc()) {
echo "<div class='column'>"; //start the column
//set the card up as a link
echo "<a href=";
echo $row["Links"];
echo">";
//set up the text trigger
echo"<div class='HiddenTextTrigger'>";
//set up the card
echo "<div class='card'>";
//Member Name
echo "<h2>";
echo $row["TeamMemberName"];
echo "</h2>";
//show the image
echo"<img src="; 
echo $row["ImageFileName"];
echo " alt='Team Member Profile Picture'>";

echo "<h3>";
echo $row["Title"];
echo "</h3>";
echo"<div class='HiddenText'>";
echo $row["Bio"];
echo "</div>"; //HiddenText
echo "</div>"; //card
echo "</div>"; //HiddenTextTrigger
echo "</a>"; //link
echo "</div>"; // Column


}




// output data of each row


//in case there is no data to show:
} else {
echo "No results"; 
}




// let's show a card
echo "<div class='column'>";
echo "<a href=";
echo">";
echo "<div class='card'>";
echo "<h2>";
echo "</h2>";
echo"<br><img src='MilliganRoboticsMemberIcon.png' alt='Html code for a link in visual studio.'>";
echo "<br>";
echo "</div>"; //card
echo "</a>";
echo "</div>"; // Column





while ($row=$result->fetch_assoc()) {
echo "<div class='column'>";
echo "<a href=";
echo">";
echo "<div class='card'>";
echo "<h2>";
echo "</h2>";
echo $row["TeamMemberName"];
echo "</div>"; //card
echo "</div>"; // Column


echo $row["FirstName"];
echo $row["LastName"];
echo $row["ImageFileName"];
echo $row["Title"];
echo $row["Links"];
echo $row["Bio"];
echo $row["Status"];


}








$conn->close();//closes the connection
?>









<footer>
<p>Copyright 2020 Milligan Robotics.</p>
</footer>

</div></body></html>
