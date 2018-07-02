<html>

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/filo.css"></link>

</head>

<body>
<h1> Welcome to the projectkit project management system. </h1>
It is a tool for managing project metadata. See: <a href="about.php">About</a>


<div>

<h3 style="margin-left: 50px;"> Projects </h3> 
<?php
include_once "config.php";

echo "<link href=\"css/home.css\" rel=\"stylesheet\", type=\"text/css\" > ";
echo "<div class=\"optselect\">";
echo "choose project: <br/><br/>";
$dirs = scandir( $project_directory );
echo "<form method=\"POST\" action=\"project.php\">";
echo "<select name = \"opts\">";
for( $i = 0; $i <sizeof( $dirs ); $i++ ) {
    if( $dirs[$i] != '.' && $dirs[$i] != '..' ) {
	echo "<option value=\"" . $dirs[$i] . "\" style=\"width: 100px;\">" . $dirs[$i]  . "</option>";
    }
}
echo "</select>";
echo "<input type=\"submit\" value=\"open\" style=\"margin-left:20px;\">";
echo "</form>";
echo "</div>";
?>
</div>
<div>


</div>

</body>
</html>



