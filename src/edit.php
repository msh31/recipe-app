<?php
require "db/dbconnection.class.php";
$dbconnect = new dbconnection();
$id = $_GET['id'];

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['update'])) {
    $recipe_name = $_POST['recipe_name'];
    $number_for = $_POST['number_for'];
    $preparation = $_POST['preparation'];
    $recipe_id = $_POST['id'];
    
    $sql = "UPDATE recipes SET recipe_name = ?, number_for = ?, preparation = ? WHERE id = ?";
    $query = $dbconnect->prepare($sql);
    
    if ($query->execute([$recipe_name, $number_for, $preparation, $recipe_id])) {
        header("Location: recipe.php?id=" . $recipe_id);
        exit();
    } else {
        $error = "Er is een fout opgetreden bij het bijwerken van het recept.";
    }
}

$sql = "SELECT * FROM recipes WHERE id = ?";
$query = $dbconnect->prepare($sql);
$query->execute([$id]);
$recset = $query->fetchAll(PDO::FETCH_ASSOC);

if (empty($recset)) {
    header("Location: index.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recept - edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Recept bewerken</h1>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $recset[0]['id'] ?>">
        
        <div class="mb-3">
            <label for="recipe_name" class="form-label">Receptnaam</label>
            <input type="text" class="form-control" id="recipe_name" name="recipe_name" value="<?php echo htmlspecialchars($recset[0]['recipe_name']) ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="number_for" class="form-label">Aantal personen</label>
            <input type="number" class="form-control" id="number_for" name="number_for" value="<?php echo $recset[0]['number_for'] ?>" min="1" required>
        </div>
        
        <div class="mb-3">
            <label for="preparation" class="form-label">Bereiding</label>
            <textarea class="form-control" id="preparation" name="preparation" rows="5" required><?php echo htmlspecialchars($recset[0]['preparation']) ?></textarea>
        </div>
        
        <div class="mb-3">
            <button type="submit" name="update" class="btn btn-primary">Recept bijwerken</button>
            <a href="index.php" class="btn btn-secondary">Annuleren</a>
        </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu"
        crossorigin="anonymous"></script>
</body>

</html>