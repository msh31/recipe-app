<?php
require "db/dbconnection.class.php";

$dbconnect = new dbconnection();
$sql = "SELECT id, recipe_name, number_for FROM recipes";
$query = $dbconnect -> prepare($sql);
$query -> execute(); 
$recset = $query -> fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <a href='index2.php'>link naar formulier</a>
    <h1>Alle recepten</h1>
    
    <table class="table">
        <tr>
          <th>naam recept</th>
          <th>voor hoeveel personen</th>
          <th>actie</th>
          <th>actie</th>
        </tr>
      <?php foreach ($recset as $record): ?>
        <tr>
          <td><?= $record['recipe_name'] ?></td>
          <td><?= $record['number_for'] ?></td>
          <td><a href='edit.php?id=<?= $record['id'] ?>'>edit</a></td>
          <td><a href='recipe.php?id=<?= $record['id'] ?>'>details</a></td>
        </tr>
      <?php endforeach ?>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>