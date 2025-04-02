<?php
/* echo "<pre>";
print_r($_POST);
echo "</pre>";
exit(0);*/
require "db/dbconnection.class.php";
$dbconnect = new dbconnection();
//kijken of er submit is geplaatst
if(isset($_POST['mealName']))
{
  $name = $_POST['mealName'];
  $number = $_POST['numberPersons'];
  $prep = $_POST['preparation'];
  $sql = "INSERT INTO recipes (recipe_name, number_for, preparation) VALUES ('$name', '$number', '$prep')";
  $query = $dbconnect -> prepare($sql);
  $query -> execute() ;
}
header('location: index.php');