<?php

declare(strict_types=1);

$pageTitle = $page['title'] . ' | ' . $site['name'];
$canonical = canonicalUrl($site, $currentSlug);
$structuredData = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'Organization',
            '@id' => rtrim($site['base_url'], '/') . '/#organization',
            'name' => $site['name'],
            'url' => rtrim($site['base_url'], '/') . '/',
            'description' => $site['tagline'],
            'brand' => [
                '@type' => 'Brand',
                'name' => $site['product'],
            ],
        ],
        [
            '@type' => 'WebSite',
            '@id' => rtrim($site['base_url'], '/') . '/#website',
            'name' => $site['name'],
            'url' => rtrim($site['base_url'], '/') . '/',
            'inLanguage' => 'es-CO',
        ],
        [
            '@type' => 'SoftwareApplication',
            '@id' => rtrim($site['base_url'], '/') . '/#mallor',
            'name' => $site['product'],
            'applicationCategory' => 'BusinessApplication',
            'operatingSystem' => 'Web',
            'description' => 'Software contable para facturación electrónica, inventario y gestión operativa.',
            'publisher' => [
                '@id' => rtrim($site['base_url'], '/') . '/#organization',
            ],
        ],
    ],
];

if ($currentSlug === 'blog/rango-dian-facturacion-electronica') {
    $structuredData['@graph'][] = [
        '@type' => 'Article',
        '@id' => $canonical . '#article',
        'headline' => $page['title'],
        'description' => $page['description'],
        'datePublished' => '2026-09-05',
        'dateModified' => '2026-09-05',
        'inLanguage' => 'es-CO',
        'author' => [
            '@id' => rtrim($site['base_url'], '/') . '/#organization',
        ],
        'publisher' => [
            '@id' => rtrim($site['base_url'], '/') . '/#organization',
        ],
        'mainEntityOfPage' => $canonical,
    ];
}
?>
<!doctype html>
<html lang="es-CO">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($page['description']) ?>">
    <meta name="robots" content="<?= $currentSlug === '404' ? 'noindex, follow' : 'index, follow' ?>">
    <link rel="canonical" href="<?= e($canonical) ?>">
    <meta property="og:type" content="<?= $currentSlug === 'blog/rango-dian-facturacion-electronica' ? 'article' : 'website' ?>">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($page['description']) ?>">
    <meta property="og:url" content="<?= e($canonical) ?>">
    <meta property="og:site_name" content="<?= e($site['name']) ?>">
    <meta name="theme-color" content="#0b1d33">
    <link rel="stylesheet" href="<?= e(assetPath('css/styles.css')) ?>">
    <?php renderJsonLd($structuredData); ?>
</head>
<body>
    <a class="skip-link" href="#contenido">Saltar al contenido</a>
    <?php require __DIR__ . '/partials/header.php'; ?>

    <main id="contenido">
        <?php require $pageTemplate; ?>
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>

    <a
        class="whatsapp-float"
        href="#"
        data-whatsapp-button
        data-message="<?= e($site['pending_contact_message']) ?>"
        aria-label="Escribir por WhatsApp a MALLOR"
    >
        <span>WhatsApp</span>
    </a>

    <script src="<?= e(assetPath('js/main.js')) ?>" defer></script>
</body>
</html>
