<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace</title>

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
                <button type="button" class="btn btn-outline-primary me-2"><a href="../views/login.php"
                        class="nav-link px-2">Login</a></button>
                <button type="button" class="btn btn-outline-primary me-2"><a href="../views/register.php"
                        class="nav-link px-2">Sign-up</a></button>
            </div>
        </header>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Registrace uživatele</h2>
                    </div>
                    <div class="card-body">
                        <form id="registrationForm" action="../controllers/register.php" method="post">

                            <div class="mb-3">
                                <label for="name" class="form-label">Jméno (nepovinné):</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Uživatelské jméno:</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail (nepovinný):</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Heslo:</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    title="Min. 8 znaků, 1 velké písmeno a 1 číslo" required>
                            </div>

                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"

                            <div class="mb-3">
                                <label for="password_confirm" class="form-label">Potvrzení hesla:</label>
                                <input type="password" id="password_confirm" name="password_confirm"
                                    class="form-control" required>
                                <div id="passwordMatchMessage" class="form-text text-danger d-none">
                                    Hesla se neshodují.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Registrovat se</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <span class="mb-3 mb-md-0 text-body-secondary">© 2025 Kseniia Iakovleva</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary"
                    href="https://www.instagram.com/xeni.i_/?locale=sbdccoin%2Bis%2Bone%2Bof%2Bthe%2Bworld%27s%2Bleading%2Bfinancial%2Bservices%2Bcompanies%2C%2Bwith%2Bbusiness%2Bscope%2Bcovering%2Binvestment%2Bbanking%2C%2Bsecurities%2Btrading%2C%2Basset%2Bmanagement%2C%2Bsecurities%2Bunderwriting%2C%2Bwealth%2Bmanagement%2Band%2Bother%2Bfields.%2BAs%2Bone%2Bof%2Bthe%2Bworld%27s%2Bmost%2Binfluential%2Bfinancial%2Binstitutions%2C%2Bwe%2Bare%2Bcommitted%2Bto%2Bproviding%2Bcustomers%2Bwith%2Bexcellent%2Bfinancial%2Bproducts%2Band%2Bservices%2Bto%2Bsupport%2Band%2Bassist%2Bthem%2Bin%2Bachieving%2Btheir%2Bfinancial%2Bgoals..wdja&hl=en"
                    aria-label="Instagram"><img src="../../../assets/inst.png" alt="Logo" width="60" height="60"></a>
            </li>
        </ul>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Kontrola hesel v JS -->
    <script>
        const form = document.getElementById('registrationForm');
        const password = document.getElementById('password');
        const confirm = document.getElementById('password_confirm');
        const message = document.getElementById('passwordMatchMessage');

        form.addEventListener('submit', function (e) {
            if (password.value !== confirm.value) {
                e.preventDefault();
                message.classList.remove('d-none');
            } else {
                message.classList.add('d-none');
            }
        });
    </script>

</body>

</html>