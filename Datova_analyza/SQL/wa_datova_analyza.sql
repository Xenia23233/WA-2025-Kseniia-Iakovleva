-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 01. čen 2025, 22:19
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `wa_datova_analyza`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `post_id` int(11) NOT NULL,
  `login_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `comments`
--

INSERT INTO `comments` (`comments_id`, `text`, `created_at`, `post_id`, `login_user_id`) VALUES
(29, 'jsem jsem', '2025-05-30 11:54:55', 2, 1),
(30, 'to napsala kseniia', '2025-05-30 16:58:10', 1, 1),
(31, 'ano, to napsal hmyz, a opravila kseniia admin', '2025-05-30 16:59:04', 1, 2),
(32, 'to je take znova hmyz a hmyz', '2025-05-30 16:59:32', 1, 2),
(33, 'a to napsala kseniia admin', '2025-05-30 17:02:30', 1, 1),
(34, 'ahoj, hmyz', '2025-05-30 21:10:37', 1, 2),
(35, 'hmyz', '2025-05-31 14:24:51', 2, 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`) VALUES
(1, '5 nejlepších nástrojů pro analýzu dat\r\n', 'K dispozici je široká škála nástrojů pro analýzu dat. Některé z nich jsou programovací jazyky, které jsou oblíbené mezi datovými vědci, protože se snadno používají a dobře analyzují data. Některé nástroje jsou knihovny pro tyto programovací jazyky, které zjednodušují analýzu údajů. A některé jsou samostatné aplikace, které běží v počítači nebo ve webovém prohlížeči.\r\n\r\nVýběr správných nástrojů pro analýzu dat\r\n\r\nPřed výběrem nástroje pro analýzu údajů je třeba zvážit několik otázek, zejména:\r\nJaký druh dat analyzujete? Jsou to jednoduché číselné údaje uložené v tabulkách a databázích, nebo kvalitativní údaje s otevřeným koncem, jako jsou konverzace v sociálních médiích, které vyžadují analýzu pomocí modelů strojového učení k vytvoření přehledů?\r\nKolik dat analyzujete? Pokud jsou údaje, které potřebujete analyzovat, omezené, práci zvládne téměř každý nástroj. Pokud však plánujete analyzovat big data, budete muset k analýze dat použít specifické nástroje.\r\nV jakém formátu chcete výsledky? Chcete vidět své výsledky ve formátu tabulky nebo byste raději generovali grafické zobrazení výsledků?\r\n\r\nNejpopulárnější nástroje pro analýzu dat\r\n\r\n1. Python\r\nPython je jedním z nejpoužívanějších programovacích jazyků pro analýzu dat. Je to interpretovaný, univerzální, vysokoúrovňový jazyk, který lze použít pro procedurální, funkční i objektově orientované programování. Tato flexibilita je jedním z důvodů, proč je Python oblíben u programátorů s různým zaměřením. Navíc, jeho jednoduchá syntax, která je téměř jako přirozený jazyk, z něj činí ideální volbu nejen pro profesionály, ale i pro začínající vývojáře. Co však dělá Python skvělým jazykem pro analýzu dat, jsou všechny knihovny třetích stran, které můžete do svého projektu přidat zdarma. Mnohé z těchto knihoven, jako jsou Matplotlib, PyTorch a Pandas, jsou navrženy pro zpracování dat, což znamená, že pro analýzu dat musíte napsat méně kódu.\r\n\r\n2. Matplotlib\r\nMatplotlib je knihovna Pythonu, která usnadňuje vizualizaci dat a grafické vykreslování. Můžete ji jednoduše nainstalovat na jakýkoliv operační systém, který podporuje Python, včetně Mac, Windows a Linux. Po nainstalování můžete dlouhé seznamy čísel převést na snadno srozumitelné koláčové grafy, tepelné mapy, histogramy a jiné typy vizualizací, které jsou připraveny k použití v sestavách nebo publikování online. Statistická analýza dat s Matplotlib tak získává atraktivní a přehledné zobrazení.\r\n\r\n3. PyTorch\r\nPyTorch je open source knihovna Pythonu, která se používá k vytváření, trénování a spouštění modelů strojního učení. Používá tenzory podobné polím pro kódování vstupů, výstupů a parametrů modelů. Tenzor je kontejner pro data, který může tyto údaje reprezentovat v libovolném počtu dimenzí, což z něj činí velmi flexibilní nástroj pro analýzu dat.\r\n\r\n4. SQL\r\nSQL, což je zkratka pro Structured Query Language, je programovací jazyk, který byl vytvořen pro interakci s relačními databázemi. Z tohoto důvodu a také vzhledem k tomu, že firmy ukládají většinu svých údajů v databázích, je SQL základním nástrojem, který datoví vědci a datoví analytici používají pro tvorbu reportů a analýzu dat.\r\n\r\n5. Tableau\r\nTableau je nástroj pro analýzu dat, který se používá k vytváření kvalitních vizualizací dat pro business intelligence. Dokáže extrahovat data z mnoha zdrojů, včetně Microsoft Excel, PDF souborů, různých typů databází nebo dokonce souborů uložených na AWS.\r\n\r\nZávěr\r\nNástroje pro analýzu dat vám pomohou objevovat trendy a vzorce, na jejichž základě budete umět dělat lepší rozhodnutí. K dispozici je široká škála nástrojů, od složitých programovacích jazyků až po aplikace, které vyžadují velmi málo technických znalostí.\r\n'),
(2, 'Význam datové analytiky v marketingu', 'Datová analytika zahrnuje proces sběru, zpracování a analýzy dat s cílem získat poznatky, které zlepší rozhodování v různých oblastech, včetně marketingu. Tento proces využívá různé metody a technologie, od základních statistik až po pokročilé algoritmy strojového učení.\r\n\r\nProč je datová analytika v marketingu důležitá?\r\n\r\nV marketingu umožňuje datová analytika firmám lépe chápat zákazníky a jejich chování. Analýzou dat o zákaznících marketéři rozpoznají jejich potřeby, preferované kanály a typ obsahu, který nejvíce rezonuje. To vede k tvorbě personalizovaných kampaní, které jsou lépe zacílené a účinnější než generické přístupy. \r\n\r\nJak datová analytika zlepšuje marketingové strategie?\r\n\r\nIdentifikace trendů a vzorců: Analýza historických dat odhaluje vzory v chování zákazníků, jako jsou například nákupní cykly nebo sezónní preference. To umožňuje marketérům přizpůsobit kampaně konkrétním období nebo událostem.\r\nSegmentace publika: Datová analytika pomáhá segmentovat zákazníky do skupin podle demografických údajů, chování nebo zájmů. Tímto způsobem můžete přizpůsobit marketingové sdělení různým segmentům, což zvyšuje relevanci a účinnost kampaní.\r\nPersonalizace obsahu: S daty o preferencích a historii interakcí můžete vytvářet personalizované marketingové zprávy, které přímo odpovídají potřebám jednotlivých zákazníků. Personalizace vede ke zvýšení zapojení, konverzní míry a loajality zákazníků.\r\n\r\nPodpora datové analytiky v číslech\r\n\r\nPodle průzkumu společnosti HubSpot z roku 2024 si 64 % marketérů věří, že datová analytika významně zlepšuje jejich marketingové strategie. Tento údaj ukazuje, jak efektivní využití analytiky přispívá k lepším výsledkům díky informovaným rozhodnutím a přizpůsobeným kampaním.\r\n\r\nNástroje pro datovou analytiku v marketingu\r\n\r\nExistuje mnoho nástrojů, které marketérům pomáhají analyzovat data a získat z nich užitečné poznatky. Patří mezi ně:\r\nGoogle Analytics: Ideální pro sledování návštěvnosti webu a analýzu chování uživatelů.\r\nCRM systémy (např. Salesforce): Tyto platformy umožňují sledovat a analyzovat zákaznické interakce napříč různými kanály.\r\nNástroje pro vizualizaci dat (např. Power BI): Pomáhají přehledně prezentovat data a odhalit vzory v rozsáhlých datových sadách.\r\n');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password_hash`, `role`, `created_at`, `updated_at`) VALUES
(1, NULL, 'kseni', NULL, '$2y$10$Y9pP9F1.JZ5c8UMk6e2p8e8xUmEPDqDSJpzpQmd9l6t2e/vyGM1a.', 'admin', '2025-05-29 20:27:28', '2025-05-30 15:01:06'),
(2, NULL, 'hmyz', NULL, '$2y$10$Gj7VbYO0b2Bh/sp0FHyF1ucqoZNpgW.6iWK9zLeU/r3I6oMF9v/mK', 'user', '2025-05-29 20:31:01', NULL),
(3, NULL, 'ppp', NULL, '$2y$10$y.FjYT10qvc.nd.nNSmzEOTsbkN85/B0UiTy4ddTOHfyw3o3HIFCq', 'user', '2025-05-29 20:58:22', NULL);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`),
  ADD KEY `id` (`post_id`),
  ADD KEY `fk_comment_user` (`login_user_id`);

--
-- Indexy pro tabulku `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pro tabulku `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`login_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
