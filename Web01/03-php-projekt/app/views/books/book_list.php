<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat knihu</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">

    <div class="container mt-5"></div>

    <div>
    <h1>Vypis knih</h1>

        <?php if(!empty($books)): ?> <!-- jestli books je empty nebo ne -->
        <!--<h3>Hruby vypis</h3>
        <?php var_dump($books); ?>
        <h3>Lepsi vypis</h3>
        <pre><?php print_r($books); ?></pre>-->
        <h3>Tabulkovy vypis</h3>
        <table class="table table-border table-hover">
            <thead class="table-primary">
            <tr>
                <th>Nazev</th>
                <th>Autor</th>
                <th>Kategorie</th>
                <th>Rok</th>
                <th>Cena</th>
                <th>ISBN</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($books as $book) :?> 
                <tr>
                <td><?=htmlspecialchars($book['title'])?></td>
                <td><?=htmlspecialchars($book['author'])?></td>
                <td><?=htmlspecialchars($book['category'])?></td>
                <td><?=htmlspecialchars($book['year'])?></td>
                <td><?=htmlspecialchars($book['price'])?></td>
                <td><?=htmlspecialchars($book['isbn'])?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
        <?php else: ?>
            <div class="alert alert-info">Zadne knihy nebyla nalezena</div>
        <?php endif; ?> 
            
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>