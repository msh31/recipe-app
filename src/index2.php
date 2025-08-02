<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form method="post" action="insert.php">
                    <div class="mb-3">
                        <label for="mealName" class="form-label">Naam van het gerecht</label>
                        <input type="text" class="form-control" id="mealName" name="mealName" required>
                    </div>
                    <div class="mb-3">
                        <label for="numberPersons" class="form-label">Aantal personen</label>
                        <input type="number" class="form-control" id="numberPersons" name="numberPersons" required>
                    </div>
                    <div class="mb-3">
                        <label for="preparation" class="form-label">Bereidingswijze</label>
                        <textarea class="form-control" id="preparation" name="preparation" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Bewaar</button>
                </form>
            </div>
            <div class="col"></div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>