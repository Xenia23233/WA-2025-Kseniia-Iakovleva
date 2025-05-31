<?php
session_start();
?>

<!DOCTYPE html>
<html lang="cs">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post2</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../styles/style.css">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <header
      class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a class="d-inline-flex link-body-emphasis text-decoration-none">
          <img src="../../../assets/Small_Talk.png" alt="Logo" width="100" height="100">
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="../controllers/index.php" class="nav-link px-2 link-secondary">Blog</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <?php if (isset($_SESSION['username'])): ?>
          <button type="button" class="btn btn-outline-primary me-2"><a href="#" class="nav-link px-2">Přihlášen
              jako: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></a></button>
          <button type="button" class="btn btn-outline-primary me-2"><a href="../controllers/logout.php"
              class="nav-link px-2">Odhlásit
              se</a></button>
        <?php else: ?>
          <button type="button" class="btn btn-outline-primary me-2"><a href="../views/login.php"
              class="nav-link px-2">Login</a></button>
          <button type="button" class="btn btn-outline-primary me-2"><a href="../views/register.php"
              class="nav-link px-2">Sign-up</a></button>
        <?php endif; ?>
      </div>
    </header>

    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary"
      style="background-image: url('../../../assets/pozadi.jpg'); background-size: cover; background-position: center;">
    </div>

    <div class="text-body mb-4" style="line-height: 1.7; font-size: 1.1rem;">
      <article class="blog-post">
        <?php if (!empty($posts)): ?>
          <?php foreach ($posts as $post): ?>
            <?php if (isset($post['id']) && $post['id'] == 2): ?>
              <h1><?= htmlspecialchars($post['title']) ?></h1>
              <br>
              <?= nl2br(htmlspecialchars($post['content'])) ?>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="alert alert-info">Žádná kniha nebyla nalezena</div>
        <?php endif; ?>
      </article>
    </div>

    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary"
      style="background-image: url('../../../assets/pozadi.jpg'); background-size: cover; background-position: center;">
    </div>

    <div class="text-body mb-4" style="line-height: 1.7; font-size: 1.1rem;">
      <?php if (isset($_SESSION['login_user_id'])): ?>
        <div class="container mt-5">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header bg-primary text-white text-center">
                  <h2>Přidat komentář</h2>
                </div>
                <div class="card-body">
                  <form action="../controllers/commentController.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <input type="hidden" name="post_id" value="2">
                      <label for="text" class="form-label">Text: <span class="text-danger">*</span></label>
                      <textarea id="text" name="text" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Uložit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <div class="text-body mb-4" style="line-height: 1.7; font-size: 1.1rem;">
      <article class="blog-post">
        <?php if (!empty($comments)): ?>
          <?php foreach ($comments as $comment): ?>
            <?php if (isset($comment['post_id']) && $comment['post_id'] == 2): ?>
              <div class="comment-box">
                <div class="comment-meta">
                  <?php
                  require_once '../models/Database.php';
                  require_once '../models/User.php';

                  $db = (new Database())->getConnection();
                  $userModel = new User($db);
                  ?>
                  <?php
                  $username = $userModel->getUsernameById($comment['login_user_id']);
                  ?>
                  <span>Uživatel: <?= htmlspecialchars($username) ?></span>
                  <span><?= htmlspecialchars($comment['created_at']) ?></span>
                </div>
                <div class="comment-text">
                  <?= nl2br(htmlspecialchars($comment['text'])) ?>
                </div>
              </div>
              <?php if (isset($_SESSION['login_user_id'])): ?>
                <?php
                $currentUserId = $_SESSION['login_user_id'] ?? null;
                $isAdmin = ($_SESSION['role'] ?? '') === 'admin';
                $ownsBook = $currentUserId == $comment['login_user_id'];

                if ($isAdmin || $ownsBook):
                  ?>
                  <div class="text-body comment-actions mt-2 d-flex gap-2 mb-4" style="line-height: 1.7; font-size: 1.1rem;">
                    <a href="?edit=<?= $comment['comments_id'] ?>" class="btn btn-sm btn-warning">Upravit</a>
                    <a href="../controllers/comment_delete.php?comments_id=<?= $comment['comments_id'] ?>"
                      class="btn btn-sm btn-danger" onclick="return confirm('Opravdu chcete smazat komentář?');">Smazat</a>
                  </div>
                <?php endif; ?>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </article>

      <?php
      require_once '../models/Database.php';
      require_once '../models/Comment.php';

      $db = (new Database())->getConnection();
      $commentModel = new Comment($db);
      $comments = $commentModel->getAll();

      $editMode = false;
      $commentToEdit = null;

      if (isset($_GET['edit'])) {
        $editId = (int) $_GET['edit'];
        $commentToEdit = $commentModel->getById($editId);
        if ($commentToEdit) {
          $editMode = true;
        }
      }
      ?>
      <?php if ($editMode): ?>
        <div class="row justify-content-center mt-5">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header bg-primary text-white text-center">
                <h2>Upravit komentář:</h2>
              </div>
              <div class="card-body">
                <form action="../controllers/comment_update.php" method="post">
                  <input type="hidden" name="comments_id" value="<?= $commentToEdit['comments_id'] ?>">
                  <div class="mb-3">
                    <label class="form-label">ID:</label>
                    <input type="text" class="form-control" value="<?= $commentToEdit['comments_id'] ?>" disabled>
                  </div>
                  <div class="mb-3">
                    <label for="text" class="form-label">Text: <span class="text-danger">*</span></label>
                    <textarea type="text" id="text" name="text" class="form-control" required
                      value="<?= htmlspecialchars($commentToEdit['text']) ?>"><?= htmlspecialchars($commentToEdit['text']) ?></textarea>
                  </div>
                  <button type="submit" class="btn btn-success w-100">Uložit změny</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <span class="mb-3 mb-md-0 text-body-secondary">© 2025 Kseniia Iakovleva</span>
      </div>
      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class="text-body-secondary"
            href="https://www.instagram.com/xeni.i_/?locale=sbdccoin%2Bis%2Bone%2Bof%2Bthe%2Bworld%27s%2Bleading%2Bfinancial%2Bservices%2Bcompanies%2C%2Bwith%2Bbusiness%2Bscope%2Bcovering%2Binvestment%2Bbanking%2C%2Bsecurities%2Btrading%2C%2Basset%2Bmanagement%2C%2Bsecurities%2Bunderwriting%2C%2Bwealth%2Bmanagement%2Band%2Bother%2Bfields.%2BAs%2Bone%2Bof%2Bthe%2Bworld%27s%2Bmost%2Binfluential%2Bfinancial%2Binstitutions%2C%2Bwe%2Bare%2Bcommitted%2Bto%2Bproviding%2Bcustomers%2Bwith%2Bexcellent%2Bfinancial%2Bproducts%2Band%2Bservices%2Bto%2Bsupport%2Band%2Bassist%2Bthem%2Bin%2Bachieving%2Btheir%2Bfinancial%2Bgoals..wdja&hl=en"
            aria-label="Instagram"><img src="../../../assets/inst.png" alt="Logo" width="60" height="60"></a></li>
      </ul>
    </footer>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>