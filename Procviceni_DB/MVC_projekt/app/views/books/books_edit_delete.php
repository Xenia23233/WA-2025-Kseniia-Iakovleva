<?php
require_once '../../models/Database.php';
require_once '../../models/Book.php';

$db = (new Database())->getConnection();
$bookModel = new Book($db);
$books = $bookModel->getAll();

$editMode = false;
$bookToEdit = null;

if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $bookToEdit = $bookModel->getById($editId);
    if ($bookToEdit) {
        $editMode = true;
    }
}
?>


<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editace a mazání knih</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Komentari</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../views/books/book_create.php">Přidat Komentar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Výpis Komentari</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php if ($editMode): ?>
            <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                    <h2>Upravit Komentar: <?= htmlspecialchars($bookToEdit['title']) ?></h2>
                    </div>
                    <div class="card-body">
                        <form action="../../controllers/book_update.php" method="post">
                            <input type="hidden" name="id" value="<?= $bookToEdit['id'] ?>">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username: <span class="text-danger">*</span></label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email: <span class="text-danger">*</span></label>
                                <input type="text" id="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="text" class="form-label">Komentar:</label>
                                <textarea id="text" name="text" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Uložit změny</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <h2>Výpis Komentari</h2>
        <?php if (!empty($books)): ?>
            <table class="table table-bordered table-hover">
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
                <?php foreach ($books as $book): ?>
                    <tr>
                    <td><?=htmlspecialchars($book['id'])?></td>
                <td><?=htmlspecialchars($book['username'])?></td>
                <td><?=htmlspecialchars($book['email'])?></td>
                <td><?=htmlspecialchars($book['created_at'])?></td>
                <td><?=htmlspecialchars($book['text'])?></td>
                        <td>
                            <a href="?edit=<?= $book['id'] ?>" class="btn btn-sm btn-primary">Upravit</a>
                            <a href="../../controllers/book_delete.php?id=<?= $book['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Opravdu chcete smazat tuto knihu?');">Smazat</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        
            <?php else: ?>
            <div class="alert alert-info">Žádny Komentar nebyla nalezena.</div>
        <?php endif; ?>




        
        






    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>