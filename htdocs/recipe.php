<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";
//maak de PDO-connectie beschikbaar in dit bestand
require "db/dbconnection.class.php";

//maak een nieuwe connectie aan in de variabele $dbconnect
$dbconnect = new dbconnection();
$recipe_id = $_GET["id"];
//op de volgende regel bouw je een sql-query (leren we in module 10); als je alle producten uit de tabel met de naam ‘product’ wilt trekken heb je de volgende query nodig
$sql = "SELECT * FROM recipes JOIN ingredients ON recipes.id = recipe_id WHERE recipe_id = $recipe_id";

//hier zet je de query klaar, ‘prepare()’ is een functie binnen PDO die je kunt gebruiken bij de variabele $dbconnect
$query = $dbconnect -> prepare($sql);

//hier voer je de database bevraging uit, ‘execute()’ is een functie binnen PDO die je los kunt laten op de variabele $query
$query -> execute(); 

//hier sla je alle records die je uit de database opgevraagd hebt, op in de array $recset ('recset' is een afkorting voor records-set - een andere naam mag ook);
//‘fetchAll()’ is een functie binnen PDO en betekent letterlijk: trek (fetch) alles (all) uit de database op basis van de query;
//$recset is een array met gevonden records uit de database
$recset = $query -> fetchAll(PDO::FETCH_ASSOC);

//om te zien wat je nu precies uit de database gehaald hebt:
/*echo "<pre>";
print_r($recset);
echo "</pre>";*/
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
    <body>
        <div class="container">
    <a href='index2.php'>link naar formulier</a>
    <h1>Recept voor <?php echo $recset[0]['recipe_name'] ?></h1>
    <h5>
    <?php echo $recset[0]['preparation'] ?>
    </h5>
    <table class="table table-sm">
      <tr>
        <th>naam ingredient</th>
        <th>hoeveelheid</th>
        <th>eenheid</th>
      </tr>
      <?php
    //hier komt per tabelrij een record uit de database
    //$recset is een array met records; via de foreach-constructie doorloop je
    //$recset-array: elk record komt 1 voor 1 aan de beurt
    foreach ($recset as $record) {
      echo "<tr>
        <td>".$record['ingred_name']."</td>
        <td>{$record['amount']}</td>
        <td>{$record['unit']}</td>
      </tr>";
    }
      ?>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>