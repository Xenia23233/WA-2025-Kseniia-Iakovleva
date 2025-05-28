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
    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary"
      style="background-image: url('../../../assets/pozadi.jpg'); background-size: cover; background-position: center;">
    </div>
    <div class="text-body" style="line-height: 1.7; font-size: 1.1rem;">
      <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1">Datová Analýza</h2>
        <p class="blog-post-meta">January 1, 2021 </p>
        <p>V dnešní digitální éře hraje datová analýza klíčovou roli ve všech oblastech podnikání a vědy. S rostoucím
          množstvím generovaných dat je schopnost tato data efektivně analyzovat a interpretovat neocenitelná. Datová
          analýza umožňuje organizacím činit informovaná rozhodnutí, optimalizovat procesy a získávat konkurenční
          výhodu. Tento článek poskytuje úvod do světa datové analýzy a jejího významu v moderním světě.</p>
        <h2>Co je Datová Analýza?</h2>
        <p>Datová analýza je proces inspekce, čištění, transformace a modelování dat s cílem objevit užitečné informace,
          vyvozovat závěry a podporovat rozhodování. Může zahrnovat různé techniky od jednoduché statistické analýzy až
          po pokročilé metody strojového učení a umělé inteligence.</p>
        <h2>Hlavní Kroky Datové Analýzy</h2>
        <ol>
          <li>Sběr Dat: Prvním krokem datového analytika je získání relevantních dat. Data mohou pocházet z různých
            zdrojů, včetně databází, senzorů, webových stránek, sociálních médií a dalších.</li>
          <li>Čištění Dat: Data často obsahují chyby, chybějící hodnoty nebo nesrovnalosti. Čištění dat zahrnuje
            odstranění nebo opravu těchto problémů, aby byla data připravena pro analýzu.</li>
          <li>Transformace Dat: V této fázi jsou data transformována do formátu vhodného pro analýzu. To může zahrnovat
            normalizaci, agregaci nebo konverzi dat do jiného formátu.</li>
          <li>Analýza Dat: Samotná analýza může zahrnovat statistické testy, korelační analýzy, regresní modely,
            klasifikaci, shlukování a další metody. Cílem analýzy je identifikovat vzory, trendy a vztahy v datech.</li>
          <li>Vizualizace Dat: Výsledky analýzy jsou následně prezentovány ve formě grafů, tabulek a dalších vizuálních
            nástrojů, které usnadňují interpretaci a komunikaci zjištění.</li>
          <li>Interpretace a Závěry: Posledním krokem je interpretace výsledků analýzy a formulování závěrů, které mohou
            být použity k podpoře rozhodování.</li>
        </ol>
        <h2>Aplikace Datové Analýzy</h2>
        <p>Datová analýza se uplatňuje v mnoha oblastech, včetně:</p>
        <div style="display: flex; align-items: flex-start; gap: 20px;">
          <ul>
            <li>Obchod: Analýza zákaznického chování, optimalizace dodavatelských řetězců, predikce prodeje.</li>
            <li>Zdravotnictví: Predikce nemocí, analýza zdravotnických dat, zlepšení léčebných postupů.</li>
            <li>Finance: Hodnocení rizik, detekce podvodů, investiční analýzy.</li>
            <li>Marketing: Segmentace trhu, analýza kampaní, personalizace nabídek.</li>
            <li>Výzkum: Analýza vědeckých dat, statistické testování hypotéz, modelování.</li>
          </ul>
          <img src="../../../assets/grafy.png" alt="Ilustrační obrázek" style="width: 500px; border-radius: 10px;">
        </div>
        <h2>Závěr</h2>
        <p>Datová analýza je nezbytná dovednost pro moderní pracovní sílu a podniky. Schopnost efektivně analyzovat a
          interpretovat data přináší nejen hlubší porozumění problémům, ale také nové příležitosti pro inovace a růst.
        </p>
      </article>
      <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary"
        style="background-image: url('../../../assets/pozadi.jpg'); background-size: cover; background-position: center;">
      </div>
      <div class="row mb-2">
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                  <?php if (isset($post['id']) && $post['id'] == 1): ?>
                    <h3><?= htmlspecialchars($post['title']) ?></h3>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php endif; ?>
              <div class="mb-1 text-body-secondary">Nov 12</div>
              <a href="../controllers/post1.php" class="icon-link gap-1 icon-link-hover stretched-link">
                Číst
                <svg class="bi" aria-hidden="true">
                  <use xlink:href="#chevron-right"></use>
                </svg>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <img class="bd-placeholder-img" width="250" height="250" src="../../../assets/Data.png" role="img"
                aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                  <?php if (isset($post['id']) && $post['id'] == 2): ?>
                    <h3><?= htmlspecialchars($post['title']) ?></h3>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php endif; ?>
              <div class="mb-1 text-body-secondary">May 11</div>
              <a href="../controllers/post2.php" class="icon-link gap-1 icon-link-hover stretched-link">
                Číst
                <svg class="bi" aria-hidden="true">
                  <use xlink:href="#chevron-right"></use>
                </svg>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <img class="bd-placeholder-img" width="250" height="250" src="../../../assets/analytics.png" role="img"
                aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">

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