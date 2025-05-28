<?php
//session_start();

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="cs">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home page</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/public/css/styles.css">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <header
      class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="#" class="d-inline-flex link-body-emphasis text-decoration-none">
          <img src="../../../assets/Small Talk.png" alt="Logo" width="60" height="60">
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="../controllers/index.php" class="nav-link px-2 link-secondary">Blog</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2"><a href="login.php"
            class="nav-link px-2">Login</a></button>
        <button type="button" class="btn btn-outline-primary me-2"><a href="registr.php"
            class="nav-link px-2">Sign-up</a></button>
      </div>
    </header>

    <body class="bg-light">

       

</body>

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
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>