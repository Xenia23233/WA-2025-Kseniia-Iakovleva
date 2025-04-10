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
    <div class="container mt-5">
    <body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Knihovna</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/view/books/book_create.php">Přidat knihu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/controllers/books_list.php">Výpis knih</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Time</th>
                <th>Komentar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($books as $book) :?> 
                <tr>
                <td><?=htmlspecialchars($book['id'])?></td>
                <td><?=htmlspecialchars($book['username'])?></td>
                <td><?=htmlspecialchars($book['email'])?></td>
                <td><?=htmlspecialchars($book['created_at'])?></td>
                <td><?=htmlspecialchars($book['text'])?></td>
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