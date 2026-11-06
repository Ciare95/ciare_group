<?php

declare(strict_types=1);

$pageTitle = $page['title'];
$canonical = canonicalUrl($site, $currentSlug);
?>
<!doctype html>
<html lang="es-CO">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($page['description']) ?>">
    <meta name="robots" content="noindex, follow">
    <link rel="canonical" href="<?= e($canonical) ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($page['description']) ?>">
    <meta property="og:url" content="<?= e($canonical) ?>">
    <meta property="og:site_name" content="<?= e($site['name']) ?>">
    <meta name="theme-color" content="#0b1d33">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="<?= e(assetPath('css/styles.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetPath('css/landing.css')) ?>">
</head>
<body class="lp-page">
    <a class="skip-link" href="#contenido">Saltar al contenido</a>

    <header class="lp-header">
        <div class="lp-container lp-header-inner">
            <a href="<?= e(urlFor('inicio')) ?>" aria-label="Ir al inicio de Ciare Group">
                <img
                    class="lp-logo"
                    src="<?= e(assetPath('img/mallor-logo.png')) ?>"
                    alt="Mallor Contable"
                    width="148"
                    height="46"
                >
            </a>
            <a class="button button-primary lp-header-cta" href="#demo">Probar Mallor Contable</a>
        </div>
    </header>

    <main id="contenido">
        <?php require $pageTemplate; ?>
    </main>

    <footer class="lp-footer">
        <div class="lp-container lp-footer-inner">
            <img
                src="<?= e(assetPath('img/mallor-logo.png')) ?>"
                alt="Mallor Contable"
                width="110"
                height="34"
                class="lp-footer-logo"
            >
            <p class="lp-footer-copy">
                &copy; <?= date('Y') ?> Ciare Group &middot; Todos los derechos reservados.
            </p>
        </div>
    </footer>

    <div class="lp-sticky-bar" id="js-sticky" aria-hidden="true">
        <a class="lp-sticky-btn" href="#demo">Probar Mallor Contable</a>
    </div>

    <script src="<?= e(assetPath('js/landing.js')) ?>" defer></script>
</body>
</html>
